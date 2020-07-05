<?php

namespace App\Http\Controllers;

use App\Goods;
use App\Order;
use App\User;
use Swift_Mailer;
use Swift_SmtpTransport;
use Swift_Message;

class OrderController extends Controller
{
    public function makeOrder($id)
    {
        $userName = trim($_GET['name']);
        $userEmail = trim($_GET['email']);

        if ($userName && $userEmail) {
            // если есть на кого сделать заказ, делаем
            $order = new Order(
                [
                    'user_name' => $userName,
                    'user_email' => $userEmail,
                    'good_id' => $id,
                ]
            );
            $order->save();
            $orderId = $order->id;

            /** @var Goods $good */
            $good = Goods::getById($id);

            // если заказ в системе создался, шлём письма
            if ($orderId > 0) {
                $mailBody = "Спасибо за заказ! Мы уже ищем $good->name по всему складу. В скором времени мы с Вами свяжемся!";
                $adminNotBody = "Пользователь $order->user_name c почтой $order->user_email заказал товар $good->name";


                $transport = (new Swift_SmtpTransport(env('MAIL_HOST'), env('MAIL_PORT'), env('MAIL_ENCRYPTION')))
                    ->setUsername(env('MAIL_USERNAME'))
                    ->setPassword(env('MAIL_PASSWORD'));


                $mailer = new Swift_Mailer($transport);

                // письмо заказчику
                $message = (new Swift_Message('Заказ №' . $orderId . ' принят'))
                    ->setFrom([env('MAIL_USERNAME') => 'ГеймсМаркет'])
                    ->setTo([$userEmail])
                    ->setBody($mailBody);

                // письмо админам
                $adminNotification = (new Swift_Message('Новый заказ'))
                    ->setFrom([env('MAIL_USERNAME') => 'ГеймсМаркет'])
                    ->setTo(User::getAdminEmails())
                    ->setBody($adminNotBody);


                $mailingResult = $mailer->send($message);
                $mailer->send($adminNotification);

            }

        }

        if ($orderId > 0 && $mailingResult) {
            return 'Заказ успешно оформлен. Скоро мы с вами свяжемся <a href="/">OK</a>';
        } else {
            return 'Произошла ошибка, всего доброго <a href="/">OK</a>';
        }

    }
}
