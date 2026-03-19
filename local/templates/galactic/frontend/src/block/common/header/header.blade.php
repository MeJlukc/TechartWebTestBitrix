<header class="{{ $block }}">

    <a href="/" class="{{ $block->elem('logo') }}">
        <img
        class="{{ $block->elem('logo_image') }}"
        src="<?=SITE_TEMPLATE_PATH?>/images/logo.svg" alt="Logo"
        >
        <p class="{{ $block->elem('logo__title') }}">
            Галактический<br>
            вестник
        </p>
    </a>

    <nav class="{{ $block->elem('navigation') }}">
        {!! $menu !!}
    </nav>

    <div class="{{ $block->elem('auth-field') }}">
        {!! $auth !!}
    </div>

</header>