<div class="wrapper">
    <div class="background">
        <div class="gradient-circle"></div>
    </div>
    <div class="content">
        <slot/>
    </div>
</div>

<style>

    .wrapper {
        display: grid;
        grid-template-rows: 1fr;

        height: 100vh;
        height: 100dvh;
    }

    .background {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100vh;
        overflow: hidden;
        z-index: -1;
    }

    .background .gradient-circle {
        position: absolute;
        bottom: 100%; left: 50%;
        height: 200%; aspect-ratio: 1;
        transform: translateX(-50%) translateY(50%);
        border-radius: 50%;

        background: radial-gradient(circle, rgba(255,0,0,.4) 0%, rgba(255,0,0,0) 70%);

        animation: start-background-animation 5s ease-out forwards;
    }

    @keyframes start-background-animation {
        0% { opacity: 0; }
        100% { opacity: 1; }
    }

</style>
