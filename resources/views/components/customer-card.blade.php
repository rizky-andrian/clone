<style>
    /* Marquee styles */

    
    

    .marquee {
        --gap: 1rem;
        position: relative;
        display: flex;
        /* overflow: hidden; */
        user-select: none;
        gap: var(--gap);
    }

    .marquee__content {
        flex-shrink: 0;
        display: flex;
        justify-content: space-around;
        gap: var(--gap);
        min-width: 100%;
    }

    @keyframes scroll {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(calc(-100% - var(--gap)));
        }
    }

    /* Enable animation */
    .marquee__content {
        animation: scroll 25s linear infinite;  
    }

    /* Reverse animation */
    .marquee--reverse .marquee__content {
        animation-direction: reverse;
    }



    /* Attempt to size parent based on content. */
    .marquee--fit-content {
        max-width: fit-content;
    }

    /* Absolute position the duplicate container */
    .marquee--pos-absolute .marquee__content:last-child {
        position: absolute;
        top: 0;
        left: 0;
    }

    /* Enable position absolute animation on the duplicate content (last-child) */
    .marquee--pos-absolute .marquee__content:last-child {
        animation-name: scroll-abs;
    }

    @keyframes scroll-abs {
        from {
            transform: translateX(calc(100% + var(--gap)));
        }

        to {
            transform: translateX(0);
        }
    }

    /* Other page demo styles */
    .marquee__content>* {
        flex: 0 0 auto;
        color: white;
        margin: 2px;
        padding: 1rem 2rem;
        border-radius: 0.25rem;
        text-align: center;
    }

    .marquee__content img {
        width: 230px;
        height: 230px;
        display: block;
        object-fit: cover;
        margin: 0 auto 10px;
        border-radius: 10px;
    }

    .marquee {}

    * {
        box-sizing: border-box;
    }

    #section_customer {
        margin-block: 3rem;
        margin: 20px 250px;
        /* width: 100vw; */
        overflow: hidden;
        text-align: center;
    }

    #section_customer>*+* {
        margin-block-start: 0.5rem;
    }

    .marquee__content:hover {
        animation-play-state: paused;
    }

    @media (max-width: 768px) {
        .marquee__content img {
            width: 150px;
            height: 150px;
            margin: 0 auto 5px;
            border-radius: 5px;
        }
        .marquee {
            --gap: 0.5rem;
            overflow-x: scroll;
            -webkit-overflow-scrolling: touch;
        }
        #section_customer {
            margin: 10px;
            width: 100%;
        }
        h2 {
            font-size: 1.5rem;
        }
        .marquee__content {
            animation-duration: 40s;
        }
    }
    @media (max-width: 576px) {
        .marquee {
            flex-direction: column;
            overflow-y: auto;
            gap: 1rem;
        }
        .marquee__content {
            animation: none;
        }
    }

</style>

<section id="section_customer" class="" >
    <div class=" flex flex-col gap-10">
        <div>
            <h2 class="text-center text-3xl text-primary font-semibold">Our Customer</h2>
        </div>
    </div>

    @if ($groupedCustomers->has('Pharmaceutical'))
        <h3 class="text-xl font-bold mb-3">Pharmaceutical</h3>
        <div class="marquee enable-animation">
            <ul class="marquee__content">
                @foreach ($groupedCustomers->get('Pharmaceutical') as $item)
                    <img src="/storage/img/customer/{{ $item->customer_logo }}" alt="{{ $item->customer_name }}">
                @endforeach
            </ul>
        </div>
    @endif

   
    {{-- Personal Care Customers --}}
    @if ($groupedCustomers->has('Personal care'))
        <h3 class="text-xl font-bold mb-3">Personal Care</h3>
        <div class="marquee enable-animation marquee--reverse">
            <ul class="marquee__content">
                @foreach ($groupedCustomers->get('Personal care') as $item)
                    <img src="/storage/img/customer/{{ $item->customer_logo }}" alt="{{ $item->customer_name }}">
                @endforeach
            </ul>
        </div>
    @endif
   
    {{-- Food & Beverage Customers --}}
    @if ($groupedCustomers->has('food&beverage'))
        <h3 class="text-xl font-bold mb-3">Food & Beverage</h3>
        <div class="marquee enable-animation">
            <ul class="marquee__content">
                @foreach ($groupedCustomers->get('food&beverage') as $item)
                    <img src="/storage/img/customer/{{ $item->customer_logo }}" alt="{{ $item->customer_name }}">
                @endforeach
            </ul>
        </div>
    @endif`
   
    
    {{-- General Industry Customers --}}
    @if ($groupedCustomers->has('General Industry'))
        <h3 class="text-xl font-bold mb-3">General Industry</h3>
        <div class="marquee enable-animation marquee--reverse">
            <ul class="marquee__content">
                @foreach ($groupedCustomers->get('General Industry') as $item)
                    <img src="/storage/img/customer/{{ $item->customer_logo }}" alt="{{ $item->customer_name }}">
                @endforeach
            </ul>
        </div>
    @endif
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Dapatkan semua marquee
            const marquees = document.querySelectorAll('.marquee__content');
            
            marquees.forEach(marquee => {
                const contentWidth = marquee.scrollWidth; // Lebar total dari konten
                const containerWidth = marquee.parentElement.offsetWidth; // Lebar kontainer
                const gap = parseInt(getComputedStyle(marquee).getPropertyValue('--gap'), 10); // Gap antar elemen
                const totalDistance = contentWidth + gap; // Total jarak yang perlu ditempuh
                
                const speed = 100; // Kecepatan tetap (pixel per detik)
                const animationDuration = totalDistance / speed; // Durasi animasi yang dihitung
    
                // Atur durasi animasi berdasarkan total jarak yang ditempuh
                marquee.style.animationDuration = `${animationDuration}s`;
            });
            
        });
    </script>
    
</section>
