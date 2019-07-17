@script('js/components/shared/slideout.js')

<div class="component-shared-slideout" data-open="false">
    <div class="button">
    {{ $title }}
        <div class="vee">
            &curlyvee;
        </div>
    </div>
    <div class="content">
        <div class="content-bar"></div>
        {{ $slot }}
    </div>
</div>