@extends('front-app.layout.template')
@section('content')
@php
    use App\Models\SettingModel;
    $web_config=SettingModel::find(1);
@endphp
<div class="top_panel_title top_panel_style_1 title_present breadcrumbs_present scheme_original">
    <div class="top_panel_title_inner top_panel_inner_style_1">
        <div class="content_wrap">
            <h1 class="page_title">Contact us</h1>
            <div class="breadcrumbs">
                <a class="breadcrumbs_item home" href="{{route('dashboard')}}">Home</a>
                <span class="breadcrumbs_delimiter"></span>
                <span class="breadcrumbs_item current">Contact us</span>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumbs -->
<!-- Page Content -->
<div class="page_content_wrap page_paddings_no">
    <div class="content">
        <article class="post_item post_item_single">
            <section class="post_content">
                <!-- Google Map -->

                <!-- /Google Map -->
                <!-- Contact Us Today -->
                <div class="content_wrap">
                    <div class="empty_space height_6_75em"></div>
                    <div id="sc_form_2_wrap" class="sc_form_wrap">
                        <div id="sc_form_2" class="sc_form sc_form_style_form_2">
                            <h2 class="sc_form_title sc_item_title">
                                Contact
                                <span class="thin"> Us Today</span>
                            </h2>
                            <div class="sc_form_descr sc_item_descr">
                                <p class="margin_bottom_null">Your email address will not be published.</p>
                                <p> Required fields are marked *</p>
                            </div>
                            <div class="sc_columns columns_wrap">
                                <div class="sc_form_address column-1_3">
                                    <div class="sc_form_address_field">
                                        <span class="sc_form_address_label">Address</span>
                                        <span class="sc_form_address_data">{{$web_config->address }}</span>
                                    </div>
                                    <div class="sc_form_address_field">
                                        <span class="sc_form_address_label">We are open</span>
                                        <span class="sc_form_address_data">Mon - Sat 10:00 AM - 6:00 PM</span>
                                    </div>
                                    <div class="sc_form_address_field">
                                        <span class="sc_form_address_label">Phone</span>
                                        <span class="sc_form_address_data">{{$web_config->phone}}</span>
                                    </div>
                                    <div class="sc_form_address_field">
                                        <span class="sc_form_address_label">E-mail</span>
                                        <span class="sc_form_address_data">{{$web_config->email}}</span>
                                    </div>
                                    <div class="sc_socials sc_socials_type_icons sc_socials_shape_square sc_socials_size_tiny">
                                        <div class="sc_socials_item">
                                            <a href="{{$web_config->facebook}}" target="_blank" class="social_icons social_facebook">
                                                <span class="icon-facebook"></span>
                                            </a>
                                        </div>
                                        <div class="sc_socials_item">
                                            <a href="{{$web_config->ticktok}}" target="_blank" class="social_icons social_gplus">
                                                <i class="fa-brands fa-tiktok"></i>
                                            </a>
                                        </div>
                                        <div class="sc_socials_item">
                                            <a href="{{$web_config->instagram}}" target="_blank" class="social_icons social_gplus">
                                                <i class="fa-brands fa-instagram"></i>
                                            </a>
                                        </div>

                                        <div class="sc_socials_item">
                                            <a href="{{$web_config->twitter}}" target="_blank" class="social_icons social_twitter">
                                                <span class="icon-twitter"></span>
                                            </a>
                                        </div>
                                        <div class="sc_socials_item">
                                            <a href="{{$web_config->linkedin}}" target="_blank" class="social_icons social_linkedin">
                                                <span class="icon-linkedin"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div><div class="sc_form_fields column-2_3">
                                    <form action="{{route('form-submit')}}" method="post"  class="mt-3 mx-lg-5 mx-md-5">
                                        @csrf
                                        <div class="sc_form_info">
                                            <div class="sc_form_item sc_form_field label_over">
                                                <label class="required" for="sc_form_username">Name</label>
                                                <input id="sc_form_username" type="text" name="name" placeholder="Enter your Full Name">
                                            </div>
                                            <div class="sc_form_item sc_form_field label_over">
                                                <label class="required" for="sc_form_email">E-mail</label>
                                                <input id="sc_form_email" type="text" name="email" placeholder="Enter your E-mail">
                                            </div>
                                            <div class="sc_form_item sc_form_field label_over">
                                                <label class="required" for="sc_form_subj">Phone</label>
                                                <input id="sc_form_subj" type="text" name="phone_no" placeholder="Enter your Phone no">
                                            </div>
                                        </div>
                                        <div class="sc_form_item sc_form_message label_over">
                                            <label class="required" for="sc_form_message">Message</label>
                                            <textarea id="sc_form_message" name="message" placeholder="Message"></textarea>
                                        </div>
                                        @if($web_config->recaptcha_status === 1)
                                        <div class="g-recaptcha" data-sitekey="{{$web_config->recaptcha_site_key}}"></div>
                                        @endif
                                        <div class="sc_form_item sc_form_button">
                                            <button class="sc_button sc_button_style_dark">Send Message</button>
                                        </div>
                                        <div class="result sc_infobox"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="empty_space height_8_7em"></div>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3164.720937534381!2d-77.35175342419673!3d37.51449947205216!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b11a5b8c5a76c7%3A0xec6e8894ce7bf17f!2s5243%20S%20Laburnum%20Ave%2C%20Henrico%2C%20VA%2023231%2C%20USA!5e0!3m2!1sen!2s!4v1695639295392!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <!-- /Contact Us Today -->
            </section>
        </article>
    </div>
</div>

@endsection

