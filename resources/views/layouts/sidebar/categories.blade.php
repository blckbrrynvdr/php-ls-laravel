<style>
    .sidebar-category__item {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .cat {
        color: red;
    }
</style>
<div class="sidebar-item">
    <div class="sidebar-item__title">Категории</div>
    <div class="sidebar-item__content">
        <ul class="sidebar-category">
            <?php /** @var \App\Category $categoty */?>
            @foreach($categories as $category)
                <li class="sidebar-category__item">
                    <a href="{{ route('category', ['id' => $category->id]) }}"
                       class="sidebar-category__item__link">
                        {{ $category->name }}
                    </a>
                    @if($is_admin ?? '')
                        <a class="cat" href="{{ route('deleteCategory', ['id' => $category->id]) }}" href="">X</a>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>
<script>
    $('.cat').on('click', function (e) {
        var del = confirm('Точно удаляем?');
        if (!del) {
            e.preventDefault();
        }
    })
</script>