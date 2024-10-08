<!-- nav bar start  -->
<nav id="navbar" class="navbar navbar-expand-lg mt-5 d-flex justify-content-between">
    <div class="container-lg">
        <a class="navbar-brand" href="{{ route('guest#homePage') }}" style="color:darkviolet;">
            <h4 class="fw-bold">Dreams</h4>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ms-5" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active text-dark fs-5" aria-current="page" href="{{ route('guest#homePage') }}">ပင်မစာမျက်နှာ</a>
                <a class="nav-link  fs-5" href="{{ route('guest#aboutPage') }}">အကြောင်းအရာ</a>
                <a class="nav-link  fs-5" href="{{ route('guest#galleryPage') }}">ဓာတ်ပုံပြခန်း</a>
                <a class="nav-link  fs-5" href="{{ route('guest#servicePage') }}">ဝန်ဆောင်မှုများ </a>
                <a class="nav-link  fs-5" href="{{ route('guest#contactPage') }}">ဆက်သွယ်ရေး</a>
            </div>

        </div>
        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">

                <a href="{{ route('auth#loginPage') }}" class="navbar-brand btn btn-secondary text-white border-none fs-6 navBtn">အကောင့်ဝင်ရန်</a>

                <a href="{{ route('auth#registerPage') }}" class="navbar-brand btn btn-secondary text-white border-none fs-6 navBtn">မှတ်ပုံတင်ရန်</a>


            </div>

        </div>

    </div>
</nav>
<!-- nav bar end  -->
