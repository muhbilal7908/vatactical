@extends('front-app.layout.template')
@section('content')
<div class="top_panel_title top_panel_style_1 title_present breadcrumbs_present scheme_original">
    <div class="top_panel_title_inner top_panel_inner_style_1">
        <div class="content_wrap">
            <h1 class="page_title">Services</h1>
            <div class="breadcrumbs">
                <a class="breadcrumbs_item home" href="{{route('dashboard')}}">Home</a>
                <span class="breadcrumbs_delimiter"></span>
                <span class="breadcrumbs_item current">Services</span>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumbs -->
<!-- Page Content -->
<div class="page_content_wrap page_paddings_no">
    <!-- Content -->
    <div class="content">
        <article class="post_item post_item_single">
            <section class="post_content">
                <!-- Welcome to our store -->
                <div class="empty_space height_4_8em"></div>
                <div class="sc_section">
                    <div class="content_wrap">
                        <div class="sc_section_inner">
                            <h2 class="sc_section_title sc_item_title">Our
                                <span class="thin"> Services</span>
                            </h2>
                            <div class="sc_section_descr sc_item_descr">
                                <!-- <p class="margin_bottom_null">Lorem ipsum dolor sit amet consectetur</p>
                                <p> adipisicing elit sed do eiusmod</p> -->
                            </div>
                            <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2 responsive_columns margin_top_medium margin_bottom_medium">
                                <div class="column-1_2 sc_column_item sc_column_item_1 odd first">
                                    <h3>Transfer List</h3>
                                    <p>At VTSA, we understand the importance of a seamless and secure firearms transfer process. Our Transfer List Services are designed to provide you with unparalleled convenience, compliance, and peace of mind. Whether you're buying or selling a firearm, our dedicated services ensure that every transaction is executed with precision and in accordance with the highest industry standards.</p>


                                </div><div class="column-1_2 sc_column_item sc_column_item_2 even">
                                    <figure class="sc_image sc_image_shape_square ">
                                        <div class="position-relative">
                                            <img src="{{asset('assets/images/transfergun.jpg')}}" alt="" />
                                        <div class="mx-1 bg-red position-absolute bottom-0 px-5 py-2 shadow end-0" style="background-color: #850305;">
                                            <h4 class="text-center fs-3">Price List</h4>
                                            <ul class=" list-unstyled text-white ">
                                                <li>Private Party $25</li>
                                                 <li> Handgun $35</li>
                                                   <li>Long Gun $45</li>
                                            </ul>
                                        </div>
                                    </div>
                                    </figure>
                                </div>
                            </div>

                            <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2 responsive_columns margin_top_medium margin_bottom_medium">
                                <div class="column-1_2 sc_column_item sc_column_item_1 odd first">

                                    <figure class="sc_image sc_image_shape_square ">
                                        <div class="position-relative">
                                        <img src="{{asset('assets/images/guncleaning.jpg')}}" alt="" />
                                        <div class="mx-1 bg-red position-absolute bottom-0 px-5 py-2 shadow end-0" style="background-color: #850305;">
                                            <h4 class="text-center  fs-3">Price List</h4>
                                            <ul class=" list-unstyled text-white ">
                                                <li>Starting at $35*</li>

                                            </ul>
                                        </div>
                                    </div>
                                    </figure>



                                </div><div class="column-1_2 sc_column_item sc_column_item_2 even">
                                    <h3>Gun Cleaning</h3>
                                    <p>At VTSA, we understand the importance of firearm maintenance, and our Gun Cleaning Services are designed to keep your firearms operating at peak performance. Our skilled technicians use state-of-the-art equipment and cleaning solutions to ensure that every nook and cranny of your firearm is thoroughly cleaned. Whether you're a casual shooter or a seasoned enthusiast, trust us to preserve the reliability and longevity of your firearms. Enjoy peace of mind knowing that your investment is in the hands of professionals committed to excellence.</p>

                                </div>
                            </div>

                            <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2 responsive_columns margin_top_medium margin_bottom_medium">
                                <div class="column-1_2 sc_column_item sc_column_item_1 odd first">
                                    <h3>Gun Smithing </h3>
                                    <p>When your firearms require more than routine maintenance, turn to the Gunsmithing Services at [Your Gun Store Name]. Our skilled gunsmiths combine expertise with a passion for craftsmanship to address a wide range of firearm needs. From repairs and modifications to customizations, we take pride in delivering high-quality workmanship tailored to your unique preferences. Trust us to breathe new life into your firearms and elevate them to the next level of performance.

                                    </p>


                                </div><div class="column-1_2 sc_column_item sc_column_item_2 even">
                                    <figure class="sc_image sc_image_shape_square ">
                                        <div class="position-relative">
                                            <img src="{{asset('assets/images/gunsmithing.jpg')}}" alt="" />
                                        <div class="mx-1 bg-red position-absolute bottom-0 px-5 py-2 shadow end-0" style="background-color: #850305;">
                                            <h4 class="text-center  fs-3">Gun Smithing </h4>
                                            <ul class=" list-unstyled text-white ">
                                                <li>Upgrades, attachments,</li>
                                                 <li> trigger swaps and more*
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    </figure>
                                </div>
                            </div>

                            <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2 responsive_columns margin_top_medium margin_bottom_medium">
                                <div class="column-1_2 sc_column_item sc_column_item_1 odd first">

                                    <figure class="sc_image sc_image_shape_square ">
                                        <div class="position-relative">
                                        <img src="{{asset('assets/images/security.jpg')}}" alt="" />
                                        <div class="mx-1 bg-red position-absolute bottom-0 px-5 py-2 shadow end-0" style="background-color: #850305;">
                                            <h4 class="text-center  fs-3">Security</h4>
                                            <ul class=" list-unstyled text-white ">
                                                <li>Events</li>
                                                <li>Parties</li>
                                                <li>Money</li>
                                                <li>Transfers</li>


                                            </ul>
                                        </div>
                                    </div>
                                    </figure>



                                </div><div class="column-1_2 sc_column_item sc_column_item_2 even">
                                    <h3 >PRIVATE SECURITY</h3>
                                    <p>Safety is paramount, and at VTSA, we extend our commitment to security with our Private Security Services. Our team of highly trained and licensed professionals is dedicated to providing reliable and discreet security solutions tailored to your specific needs. Whether you require event security, personal protection, or asset safeguarding, trust us to deliver a comprehensive security service that prioritizes your peace of mind.</p>

                                </div>

                                <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2 responsive_columns margin_top_medium margin_bottom_medium">
                                    <div class="column-1_2 sc_column_item sc_column_item_1 odd first">
                                        <h3>Duracoat </h3>
                                        <p>Duracoat is a specialized firearm refinishing service available in our store. It offers a durable, protective coating for guns, enhancing their appearance and performance. Our expert application ensures a long-lasting finish, providing resistance against wear and corrosion. With a wide range of colors and finishes, we can customize and revitalize your firearms to meet your preferences.

                                        </p>


                                    </div><div class="column-1_2 sc_column_item sc_column_item_2 even">
                                        <figure class="sc_image sc_image_shape_square ">
                                            <div class="position-relative">
                                                <img src="{{asset('assets/duracoat.jpg')}}" alt="" />
                                            <div class="mx-1 bg-red position-absolute bottom-0 px-5 py-2 shadow end-0" style="background-color: #850305;">
                                                <h4 class="text-center  fs-3">Duracoat</h4>
                                                <ul class=" list-unstyled text-white ">
                                                    <li>Customization</li>
                                                     <li>Durability</li>
                                                     <li>Enhanced Aesthetics</li>
                                                     <li>Easy Maintenance</li>
                                                </ul>
                                            </div>
                                        </div>
                                        </figure>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="empty_space height_3_9em"></div>
                <!-- /Welcome to our store -->
                <!-- Our team -->
                <div class="bg_dark_style_1">
                    <div class="content_wrap">
                        <div class="empty_space height_6_9em"></div>
                        <div class="sc_team_wrap">
                            <div  class="sc_team sc_team_style_team-1">
                                <h2 class="sc_team_title sc_item_title">
                                    CLASS III &

                                    <span class="thin"> NFA ITEMS</span>
                                </h2>
                                <!-- <div class="sc_team_descr sc_item_descr">
                                    <p class="margin_bottom_null">Lorem ipsum dolor sit amet consectetur</p>
                                    <p>adipisicing elit sed do eiusmod</p>
                                </div> -->
                               <div class="row">
                                <div class="col-lg-4 col-sm-12 col-md-4">
                                    <img src="{{asset('assets/images/IMG_0286_JPG.webp')}}" alt="" />
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12 ">
                                    <h4>What are Class III/NFA items?</h4>
                                    <p>Class III/NFA items are firearm accessories that are regulated by the ATF in accordance with the National Firearm Act of 1986.

                                        ​</p>
                                        <h6 class="fw-bold">These items include:</h6>
                                        <ul>
                                            <li>Full Auto machine guns</li>
                                            <li>Suppressor (Silencers)</li>
                                            <li>Short barrel Rifles & Shotguns</li>
                                            <li>AOW (Any other Weapon)</li>
                                        </ul>
                                        <h6 class="fw-bold">Can I own a Class III item?</h6>
                                        <p>Common misconception is that these items are illegal. If you meet the criteria to own a regular firearm, most likely you are capable of qualifying to obtain a Class III item in the state of Virginia.</p>
                                        <p>VTSA carries suppressors from DEAD AIR SLIENCERS (as shown in the picture) along with many other Class III items. If there is a particular item you are looking to obtain and we do not have it listed, contact us today.</p>
                                </div>

                               </div>
                               <div class="row mt-5">
                                <div class="col-12">
                                    <h2 class="text-center">Class III / NFA Purchase Process</h2>
                                    <ol>
                                        <li>Decide what type of Class III / NFA item you are interested on and purchase it.</li>
                                        <li>Required documentation
                                            <ul>
                                                <li>BATFE Form 4 (5320.4)</li>
                                                <li>Acquire 2x Passport photos</li>
                                                <li>A photocopy of the form 4, with passport photos attached</li>
                                                <li>Complete 2x FBI FORM FD-258's</li>
                                                <li>Identify CLEO and request signoff on FORM 4</li>
                                                <li>Submit $200 BATFE check</li>
                                            </ul>
                                        </li>
                                        <li>VTSA will send a copy of your paperwork and check or money order in the sum of $200 (or $5 depending on type of item) to the BATF NFA Branch.</li>
                                        <li>Once the form is approved and VTSA receives the item we will get in contact with you to arrange the transfer of the item. You will fill out a BATF Form 4473 and you will be able to obtain the Class III/NFA  item. </li>
                                        <p class="">
                                            THIS PROCESS CAN TAKE UP TO A MINIMUM OF THREE MONTHS.
FOR ADDITIONAL INFORMATION, PLEASE FEEL FREE TO CONTACT US.
                                        </p>
                                    </ol>
                                </div>
                               </div>
                               <div class="row mt-5">
                                <div class="col-6">
                                    <p class="text-danger">50% RESTOCKING FEE WILL BE CHARGED FOR ALL NON-APPROVALS.


                                        VTSA charges a non-refundable transfer fee for items not purchased from us depending on the class of that item.

                                        </p>
                                </div>
                                <div class="col-6">
                                    <h6>Fees associated with this process

                                    </h6>
                                    <ol>
                                        <li>Filing/Transfer Fee: $95</li>
                                        <li>$200 for machine gun​</li>
                                        <li>$200 Short Barrel Rifle/ Short Barrel Shotgun</li>
                                        <li>$100 Suppressor</li>
                                    </ol>
                                </div>
                               </div>
                            </div>
                        </div>
                        <div class="empty_space height_5em"></div>
                    </div>
                </div>
                <!-- /Our team -->
                <!-- Book Right Now -->
                @include('components.courses_ctn')
                <!-- /Book Right Now -->
            </section>
        </article>
    </div>
</div>
@endsection
