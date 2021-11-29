@section('footer')
    <footer class="sec_footer">
        <div class="sec_footer__networks">
            <a href="#">
            <div class="networks__item">
                <img src="{{asset("images/Facebook.png")}}" alt="">
            </div>
            </a>
            <a href="#">
            <div class="networks__item">
                <img src="{{asset('images/Twitter.png')}}" alt="">
            </div>
            </a>
            <a href="#">
            <div class="networks__item">
                <img src="{{asset("images/Linkedin.png")}}" alt="">
            </div>
            </a>
            <a href="#">
            <div class="networks__item">
                <img src="{{asset('images/Behance.png')}}" alt="">
            </div>
            </a>
        </div>
        <div class="sec_footer__anchors">
            <div class="anchors__item">Product </div>
            <div class="anchors__item">Company</div>
            <div class="anchors__item">Learn more</div>
            <div class="anchors__item">Get in touch </div>
        </div>
        <div class="sec_footer__copyright">&copy; 2020 Expice Studio</div>
    </footer>
@endsection

{{-- Блок для изменения поведения header --}}
<script>
    window.addEventListener('load', ()=>{
        document.querySelector('.header').classList.add('header-BG');
    })
    window.addEventListener('load', ()=>{
        document.querySelector('.main').classList.add('topPadding')
    })
</script>
