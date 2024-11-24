<script>

    import { createEventDispatcher } from "svelte";

    export let shortening = false;
    export let shortenedUrl;

    const dispatch = createEventDispatcher();
    let value = "";

    $: value = shortenedUrl;

</script>

<div class="wrapper" class:shortening>
    <input type="text" placeholder="https://" bind:value={value} disabled={shortening}>
    <div class="button-wrapper">
        <button on:click={() => dispatch("shorten", value)}>Shorten</button>
        <button><i class="fi fi-sr-caret-down"></i></button>
        <div class="loader"><i class="fi fi-sr-settings"></i></div>
    </div>
</div>

<style>

    .wrapper {
        display: flex;
        align-items: stretch;

        width: min(400px, calc(100% - 1rem));

        border: 1px solid #310000;
        border-radius: 50rem;
        background-color: #310000;
        backdrop-filter: blur(4px);

        overflow: hidden;
        transition: border-color .2s;
    }
    .wrapper:has(input:focus) {
        border-color: #8E0000;
    }

    input {
        all: unset;
        flex-grow: 1;
        padding: 0 1rem;
        width: 100%;
    }

    .button-wrapper {
        display: flex; gap: .125rem;
        align-items: stretch;

        padding: .125rem;

        position: relative;
    }

    .button-wrapper button {
        display: block;

        padding: .5rem 1rem;

        background-color: #8E0000;
        border: none;
        border-top: 1px solid #A02020;
        border-bottom: 1px solid #5a0000;

        color: #fff;

        cursor: pointer;
    }
    .button-wrapper button:nth-child(1) {
        border-top-left-radius: 50rem;
        border-bottom-left-radius: 50rem;
    }
    .button-wrapper button:nth-child(2) {
        border-top-right-radius: 50rem;
        border-bottom-right-radius: 50rem;
        padding: .5rem .7rem .5rem .6rem;
    }

    .button-wrapper button:active {
        border-color: #5c0000;
        background-color: #5c0000;
    }

    .button-wrapper .loader {
        display: none;
        align-items: center;
        justify-content: center;

        position: absolute;
        top: .125rem; left: .125rem;
        width: calc(100% - .25rem); height: calc(100% - .25rem);

        background-color: #5c0000;
        border-radius: 50rem;
    }
    .wrapper.shortening .button-wrapper .loader {
        display: flex;
    }
    .button-wrapper .loader i {
        animation: spinner 1s linear infinite;
    }

    @keyframes spinner {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

</style>
