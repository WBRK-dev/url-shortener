<script>

    import {createEventDispatcher, onMount} from "svelte";

    export let shortening = false;
    export let shortenedUrl;

    const dispatch = createEventDispatcher();
    let value = "";
    let domainList = [
        "https://www.google.com/",
        "https://youtube.com/",
        "https://www.facebook.com/",
        "https://www.amazon.com/",
        "https://www.wikipedia.org/",
        "https://x.com/",
        "https://www.instagram.com/",
        "https://www.reddit.com/",
        "https://www.linkedin.com/",
        "https://www.netflix.com/",
        "https://www.yahoo.com/",
        "https://www.bing.com/",
        "https://www.pinterest.com/",
        "https://www.tumblr.com/",
        "https://www.spotify.com/",
        "https://www.tiktok.com/",
        "https://www.quora.com/",
        "https://www.ebay.com/",
        "https://www.github.com/",
        "https://www.dropbox.com/",
        "https://www.snapchat.com/",
        "https://www.airbnb.com/",
        "https://www.vimeo.com/",
        "https://www.twitch.tv/",
        "https://www.stackoverflow.com/",
        "https://www.salesforce.com/",
        "https://www.whatsapp.com/",
        "https://www.apple.com/",
        "https://www.messenger.com/",
        "https://www.medium.com/",
        "https://www.imdb.com/",
        "https://www.nike.com/",
        "https://www.hulu.com/",
        "https://www.revolut.com/",
        "https://www.bbc.com/",
        "https://www.nytimes.com/",
        "https://www.cnn.com/",
        "https://www.spotify.com/",
        "https://www.bankofamerica.com/",
        "https://www.spotify.com/",
        "https://www.weather.com/",
        "https://www.chase.com/",
        "https://www.zillow.com/",
        "https://www.craigslist.org/",
        "https://www.skyscanner.net/",
        "https://www.tesla.com/",
        "https://www.adobe.com/",
        "https://www.tripadvisor.com/",
        "https://www.dell.com/",
        "https://www.vodafone.com/",
        "https://www.reddit.com/",
        "https://www.blogger.com/"
    ];
    let domainListIndex = Math.floor(Math.random() * domainList.length);

    $: value = shortenedUrl;

    onMount(() => {
        setInterval(() => {
            domainListIndex = Math.floor(Math.random() * domainList.length);
        }, 5000);
    });

</script>

<div class="wrapper" class:shortening>
    <input type="text" placeholder={domainList[domainListIndex]} bind:value={value} disabled={shortening}>
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

        box-shadow: 0 0 5px 5px rgba(0, 0, 0, .1);

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
