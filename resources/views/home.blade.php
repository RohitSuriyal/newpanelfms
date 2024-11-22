@include('layout.header')
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="container d-flex gap-4">
        <!-- First Div -->




        <div class="shadow-lg p-3   text-center mr-5 " style="background-color: #FAD961;
background-image: linear-gradient(90deg, #FAD961 0%, #F76B1C 100%);width:35%!important;border-radius:12px">
            <h5 class="mb-3 text-white"><i class="fa-solid fa-book" style="font-size:4rem"></i></h5>
            <h4 class=" text-white font-weight-bold">Total BLogs</h4>
            <h1 class="text-white font-weight-bold">{{$blogcount}}</h1>
        </div>
        <!-- Second Div -->
        <div class="shadow-lg p-3   text-center" style="background-color: #0093E9;
background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);width:35%;border-radius:12px
">
            <h5 class="mb-3 text-white font-weight-bold"><i class="fa-solid fa-school" style="font-size:4rem"></i></h5>
            <h4 class="text-white font-weight-bold">Total Schools</h4>
            <h1 class="text-white font-weight-bold ">{{$schoolcount}}</h1>
        </div>
    </div>
</div>

@include('layout.footer')