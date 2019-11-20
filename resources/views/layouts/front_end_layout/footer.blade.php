<style type="text/stylesheet">
    .thumbnail {margin-bottom:6px;}
    .carousel-control.left,.carousel-control.right{
        background-image:none;
    }
    #list-social{
        background:#fff;
    }
    #list-social li{
        float:left;
        list-style:none;
        background:#fff;
    }
    #list-social li a{
        float:left;
        list-style:none;
        background:gray;
    }
    #list-social li a:hover{
        float:left;
        list-style:none;
        background:gray;
        opacity:0.5;
    }

    #quickNav li{
        list-style:none;
        padding-top:7px;
    }
    #list-social1 li a{
        float:left;
        list-style:none;
        color:black;
    }

</style>
<script type="text/javascript">
    /* copy loaded thumbnails into carousel */
    $('.row .thumbnail').on('load', function() {

    }).each(function(i) {
        if(this.complete) {
            var item = $('<div class="item"></div>');
            var itemDiv = $(this).parents('div');
            var title = $(this).parent('a').attr("title");

            item.attr("title",title);
            $(itemDiv.html()).appendTo(item);
            item.appendTo('.carousel-inner');
            if (i==0){ // set first item active
                item.addClass('active');
            }
        }
    });

    /* activate the carousel */
    $('#modalCarousel').carousel({interval:false});

    /* change modal title when slide changes */
    $('#modalCarousel').on('slid.bs.carousel', function () {
        $('.modal-title').html($(this).find('.active').attr("title"));
    })

    /* when clicking a thumbnail */
    $('.row .thumbnail').click(function(){
        var idx = $(this).parents('div').index();
        var id = parseInt(idx);
        $('#myModal').modal('show'); // show the modal
        $('#modalCarousel').carousel(id); // slide carousel to selected

    });
</script>

<div class="photo_gallery">
    <div class="row">

        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading" style="background-color:#004884"><!---<i class="fa fa-map-marker"></i> -->&nbsp; Find Us With Google Map</div>
                <div class="panel-body" style="min-height:185px;">
                    <div id="googleMap" class="col-lg-12">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3676.478528822044!2d89.36869696475243!3d22.858774778166573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x733ebeae8568051a!2z4Kep4Kao4KaCIOCmsOCngeCmpuCmvuCmmOCmsOCmviDgpofgpongpqjgpr_gp5_gpqgg4Kaq4Kaw4Ka_4Ka34Kam!5e0!3m2!1sen!2sbd!4v1565157392402!5m2!1sen!2sbd" width="530" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading" style="background-color:#004884">
                    <!---<i class="fa fa-map-marker"></i>--> &nbsp; Contact Us
                </div>
                <div class="panel-body" style="min-height:185px;">
                    <div>
                        <address style="text-align: center;padding-bottom:1px;">
                            <h3></h3>
                            <p></p>
                            <p>
                                মোবাইল: ০১৭১১২৪৫৬৮৮</br>
                                ফোনঃ০১৭৯২১৫৬৪৯৪</br>
                                ওয়েবসাইট:unionparishadbd.com</br>
                            </p>
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer" style="background-color:#683091;color: #fff;width:100%;margin:0px auto; "><!--Footer Start -->
        <div class="row content">
            <div class="col-md-8">
                <p>&copy; copyright {{$now = \Carbon\Carbon::now()->format('Y')}}. <a href="#" style="color:#fff;">No 3 Rudhaghara Union Parishad</a> </p>
            </div>
            <div class="col-md-4">
                <div>
                    <p>
                        Design & Developed by :
                        <a href="http://www.wardan.tech/" target="_blank" style="color:#fff;">
                            WardanTech Ltd.
                        </a>
                    </p >
                </div>
            </div>
        </div>
    </div>
</div>