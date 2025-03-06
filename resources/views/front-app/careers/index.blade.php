@extends('front-app.layout.template')
@section('content')
<div class="top_panel_title top_panel_style_1 title_present breadcrumbs_present scheme_original">
    <div class="top_panel_title_inner top_panel_inner_style_1">
        <div class="content_wrap">
            <h1 class="page_title">Careers</h1>
            <div class="breadcrumbs">
                <a class="breadcrumbs_item home" href="{{route('home')}}">Home</a>
                <span class="breadcrumbs_delimiter"></span>
                <span class="breadcrumbs_item current">Careers</span>
            </div>
        </div>
    </div>
</div>


<div class="container my-5 py-3">
    <div class="text-center">
        <h2 class="sc_section_title sc_item_title">Join Our Team at 
            <span class="thin">Vatactical</span>
        </h2>
        <div class="sc_section_descr sc_item_descr">
        <h1 class="mb-4"></h1>
        <p >We are always looking for passionate and dedicated individuals to join our team.</p>
    </div>

    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-dark">Sales Associate</h5>
                    <p class="card-text">Help customers find the perfect firearms and accessories to meet their needs. Must have excellent communication skills and a passion for the industry.</p>
                    <p><strong>Requirements:</strong></p>
                    <ul class="list-unstyled">
                        <li>High school diploma or equivalent</li>
                        <li>Experience in retail sales preferred</li>
                        <li>Basic knowledge of firearms</li>
                    </ul>
                    <button>Apply Now</button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-dark">Gunsmith</h5>
                    <p class="card-text">Perform maintenance, repairs, and custom modifications on firearms. This role requires technical expertise and a strong attention to detail.</p>
                    <p><strong>Requirements:</strong></p>
                    <ul class="list-unstyled">
                        <li>Certification or experience in gunsmithing</li>
                        <li>Strong mechanical aptitude</li>
                        <li>Knowledge of various firearm models</li>
                    </ul>
                    <button>Apply Now</button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-dark">Store Manager</h5>
                    <p class="card-text">Oversee daily operations, manage staff, and ensure the highest level of customer satisfaction. Leadership and organizational skills are key.</p>
                    <p><strong>Requirements:</strong></p>
                    <ul class="list-unstyled">
                        <li>Experience in retail management</li>
                        <li>Strong leadership abilities</li>
                        <li>Knowledge of firearms and regulations</li>
                    </ul>
                    <button>Apply Now</button>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-5">
        <h2>Why Work With Us?</h2>
        <p class="lead">At Vatactical, we value our employees and offer a supportive work environment.</p>
        <ul class="list-unstyled">
            <li><i class="bi bi-check-circle-fill text-success"></i> Competitive Pay</li>
            <li><i class="bi bi-check-circle-fill text-success"></i> Employee Discounts</li>
            <li><i class="bi bi-check-circle-fill text-success"></i> Opportunities for Growth</li>
            <li><i class="bi bi-check-circle-fill text-success"></i> Friendly and Passionate Team</li>
        </ul>
    </div>

    <div class="text-center mt-5">
        <h2>How to Apply</h2>
        <p class="lead">If you're interested in any of our open positions, please send your resume and a cover letter to <a href="mailto:careers@@vatactical.com">careers@vatactical.com</a>.</p>
    </div>
</div>
</div>
@endsection