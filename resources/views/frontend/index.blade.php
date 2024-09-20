@extends('frontend.includes.main')
@section('content')
    <!-- Hero Section with Video Background and Text Overlay -->
    <section id="hero" style="position: relative;">
        <video autoplay loop muted playsinline poster="your-poster-image.jpg"
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
            <source src="{{ asset('frontend_assets/image/SteakOnGrillCloseup.mp4') }}" type="video/mp4">
            <!-- Add additional source elements for other video formats if needed -->
        </video>
        <div class="hero container" style="position: relative; z-index: 1;">
            <div>
                <h1><strong>
                        <h1 class="text-center" style="font-family:Copperplate; color:whitesmoke;"> The Calm</h1><span></span>
                    </strong></h1>
                <h1><strong style="color:white;">A Heaven Of Taste & Calmness.<span></span></strong></h1>
                <a href="#projects" type="button" class="cta">MENU</a>
            </div>

        </div>
    </section>
    <!-- End Hero Section -->

    <!-- Menu Section -->
    <section id="projects">
        <div class="projects ">
            <div class="projects-header">
                <h1 class="section-title">Me<span>n</span>u</h1>
            </div>
            <div class="all-items">
                <select style="" id="menu-category" class="menu-category">
                    <option value="blue">ALL ITEMS</option>
                    <option value="yellow">MAIN DISHES</option>
                    <option value="red">SIDE DISHES</option>
                    <option value="green">DRINKS</option>
                </select>
            </div>



            {{-- -------------------------------------------------------------------------------- --}}


            <div class="blue msg">
                <div class="mainDish">
                    <h1 style="text-align:center">Main Dishes</h1>
                        @foreach ($mainDishes as $menu)
                            <p>
                                <span class="item-name"> <strong>{{ $menu->name }}</strong></span>
                                <span class="item-price">Rs.{{ $menu->price }}</span><br>
                                <span class="item_type"><i>{{ $menu->type }}</i></span>
                                <hr>
                            </p>
                        @endforeach

                </div>

                <div class="sideDish">
                    <h1 style="text-align:center">SIDE DISHES</h1>
                    @foreach ($sideDishes as $menu )
                        
                    <p>
                        <span class="item-name"> <strong>{{$menu->name}}</strong></span>
                        <span class="item-price">Rs.{{$menu->price}}</span><br>
                        <span class="item_type"><i>{{$menu->type}}</i></span>
                        <hr>
                    </p>
                    @endforeach
                </div>

                <div class="drinks">
                    <h1 style="text-align:center">DRINKS</h1>
                    @foreach ($drinks as $menu )
                        
                    <p>
                        <span class="item-name"> <strong>{{$menu->name}}</strong></span>
                        <span class="item-price">Rs.{{$menu->price}}</span><br>
                        <span class="item_type"><i>{{$menu->type}}</i></span>
                        <hr>
                    </p>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
    <!-- End Menu Section -->

    <!-- About Section -->
    <section id="about">
        <div class="about container">
            <div class="col-right">
                <h1 class="section-title">About <span>Us</span></h1>
                <h2>The Calm Company History:</h2>
                <p>The Calm is a well-established Western food establishment in the city's heart. The Calm has become a
                    popular choice for customers looking to celebrate special occasions or simply
                    enjoy a relaxing meal, with a focus on providing delicious meals and a friendly dining experience.</p>
                <p>The Calm, as a Western restaurant, offers a diverse menu that caters to a variety of tastes.
                    The menu includes a wide range of options such as bar bites, salads, soups and a variety of main
                    courses. Customers can savour succulent options such as steak and ribs, chicken, lamb, seafood, burgers
                    and sandwiches, pasta, and a variety of delectable side dishes. The menu has been carefully curated to
                    offer a balance of classic favourites and innovative creations, ensuring that every palate is satisfied.
                </p>
                <p>The Calm's ability to accommodate customers is one of its distinguishing features. The Calm strives to
                    create an inviting and comfortable dining environment, whether guests prefer to
                    walk in or make reservations in advance. The restaurant recognises the significance of creating
                    memorable experiences, particularly for those celebrating special occasions. The Calm is a
                    popular choice for families, couples, and groups of friends because of its attentive staff and welcoming
                    atmosphere.</p>
                <p>The Calm has an inviting outdoor bar that is open seven days a week from 11:00 AM to 10:00
                    PM in addition to the indoor dining area. This outdoor space provides a relaxed setting for patrons to
                    unwind and socialise while sipping on their favourite drinks and nibbling on bar bites. The bar serves a
                    wide range of beverages, including cocktails, wines, beers and non-alcoholic options.</p>
            </div>
        </div>
    </section>
    <!-- End About Section -->

    <!-- Contact Section -->
    <section id="contact">
        <div class="contact container">
            <div>
                <h1 class="section-title">Contact <span>info</span></h1>
            </div>
            <div class="contact-items">
                <div class="contact-item contact-item-bg">
                    <div class="contact-info">
                        <div class='icon'><img src="{{ asset('frontend_assets/image/icons8-phone-100.png') }}"
                                alt="Phone Icon" /></div>
                        <h1>Phone</h1>
                        <h2>+60 886 8786</h2>
                    </div>
                </div>

                <div class="contact-item contact-item-bg">
                    <div class="contact-info">
                        <div class='icon'><img src="{{ asset('frontend_assets/image/icons8-email-100.png') }}"
                                alt="Email Icon" /></div>
                        <h1>Email</h1>
                        <h2>JohnnysDining@gmail.com</h2>
                    </div>
                </div>

                <div class="contact-item contact-item-bg">
                    <div class="contact-info">
                        <div class='icon'><img src="{{ asset('frontend_assets/image/icons8-home-address-100.png') }}"
                                alt="Address Icon" /></div>
                        <h1>Address</h1>
                        <h2>Lot 62, Third Floor, Jalan Newton, No.345, Lorong Kluang, Kota Kinabalu, Malaysia, 88000</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Section -->



    <script>
        // JavaScript to handle category filtering
        document.getElementById('menu-category').addEventListener('change', function() {
            var selectedCategory = this.value;
            var items = document.querySelectorAll('.msg');
            items.forEach(function(item) {
                if (item.classList.contains(selectedCategory)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    </script>
    </body>

    </html>
@endsection
