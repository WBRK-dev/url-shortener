<script>
    import { page } from '@inertiajs/svelte'

    import Layout from '../../Layout/Main/Index.svelte';
    import Input from "./Input.svelte";

    let shortening = false;
    let shortenedUrl;

    let values = {
        "_token": $page.props.csrf_token,
    }

    const shorten = async (e) => {
        shortening = true;
        values.url = e.detail;

        let json;
        try {
            json = await fetch('/api/shorten', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(values),
            }).then(response => response.json());
        } catch {
            shortening = false;
            return;
        }

        shortening = false;
        shortenedUrl = json.shortened;
    }

</script>

<Layout>
    <div class="wrapper">

        <h1>URL Shortener</h1>

        <div class="input-wrapper">
            <Input shortening={shortening} shortenedUrl={shortenedUrl} on:shorten={shorten} />
        </div>

    </div>
</Layout>

<style>

    .wrapper {
        display: flex;
        flex-direction: column;

        height: 100%;
        box-sizing: border-box;
        padding: 4rem 0;
    }

    h1 {
        font-size: 3rem;
        text-align: center;
    }

    .input-wrapper {
        display: flex;
        justify-content: center;

        margin: auto 0;
    }

</style>
