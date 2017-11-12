
<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=123106857726295";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<div class="container-fluid footer-bg-color">
    <div class="container">
        <div class="row footer">

            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-12">
                <h4>Navigate</h4>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="post.php">Post a Job</a></li>
                    <li><a href="#" data-toggle="modal" data-target=".bd-example-modal-sm">Login</a></li>
                    <li><a href="#" data-toggle="modal" data-target=".bd-example1-modal-sm">Register</a></li>
                    <li><a href="alljobs.php">Find a Photographer</a></li>
                </ul>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-12">
                <h4>Company Info</h4>
                <ul>
                    <li><a href="#">About PhotoLinga</a></li>
                    <li><a href="#">How it works</a></li>
                    <li><a href="#">Directory</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of service</a></li>
                </ul>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-12">
                <h4>Resources</h4>
                <ul>
                    <li><a href="#">Help & FAQ</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>

            <div class="col-xl-4 col-lg-4 no-md"></div>

            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-12 align-right">
                <h4>Social</h4>
                <ul>
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i> &nbsp;Facebook</a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i>&nbsp;Twitter</a></li>
                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i>&nbsp;LinkedIn</a></li>
                    <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i>&nbsp;Pinterest</a></li>
                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i>&nbsp;Google +</a></li>
                </ul>
            </div>
        </div>

        <div class="row copyright">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <p class="pull-left">&copy; Copyright all right reserved</p>
                <p class="pull-right">Designed by<a href="https://www.mictronicx.com"> Mictronicx</a></p>
            </div>
        </div>
    </div>
</div>