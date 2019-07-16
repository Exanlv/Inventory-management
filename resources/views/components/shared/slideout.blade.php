@script('js/components/slideout.js')

<style>
.slideout-container {
    position: relative;
    width: 100%;
    margin: auto;
    border: 1px solid #ced4da;
    padding: .375rem .75rem;
    color: #495057;
    border-radius: .25rem;
}

.slideout-content {
    display: none;
    overflow: hidden;
}

.slideout-content-bar {
    margin-top: 0.375rem;
    margin-bottom: 0.5rem;
    width: 100%;
    height: 0;
    border-top: 2px dotted #ced4da;
}

.slideout-button {
    position: relative;
    cursor: pointer;
}

.slideout-vee {
    position: absolute;
    top: 0;
    right: .75rem;
}
</style>

<div class="slideout-container" data-open="false">
    <div class="slideout-button">
    {{ $title }}
        <div class="slideout-vee">
            &curlyvee;
        </div>
    </div>
    <div class="slideout-content">
        <div class="slideout-content-bar"></div>
        {{ $slot }}
    </div>
</div>