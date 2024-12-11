@include("layout.header")
<a href="{{('/finalsubmit')}}"><button class="btn btn-success">test</button></a>
<div class=" container d-flex justify-content-end ">
    <a href="{{route('finalsubmitdata')}}"><button class="btn btn-success mr-3">Refresh</button></a>
    <a href="{{route('finalsubmit')}}"><button class="btn btn-success">Final submit</button></a>
</div>
<div class="tab-container p-3">
    <div class="row" style="margin-left:9rem;margin-right:9rem">
        <a href="#" id="tabbing1" class="tab active m-2 text-decoration-none" data-target="tab1">Basic Details</a>
        <a href="#" id="tabbing2" class="tab m-2 text-decoration-none" data-target="tab2">Overview Inforamtion</a>
        <a href="#" id="tabbing3" class="tab m-2 text-decoration-none" data-target="tab3">Fee Structure</a>
    </div>
    <div class="row" style="margin-left:9rem;margin-right:9rem">
        <a href="#" id="tabbing4" class="tab m-2 text-decoration-none" data-target="tab4">Eligiblity</a>
        <a href="#" id="tabbing5" class="tab m-2 text-decoration-none" data-target="tab5">Facilities</a>
        <a href="#" id="tabbing6" class="tab m-2 text-decoration-none" data-target="tab6">Gallery</a>
    </div>


</div>

<div class="content-container mb-5">
    <div id="tab1" class="content active-content ">
        <h2 class="text-center mb-4">Basic Details</h2>
        <form method="post" id="submitbasic_detail" action="{{route('basicdetail')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label class="form-conrtol">Name of the school</label>
                    <input class="form-control" name="name">

                </div>
                <div class="col-md-6">
                    <label class="form-conrtol">Category</label>
                    <select class="form-control my-2" id="category" multiple name="school_type[]">

                        <option>Day School</option>
                        <option>Boarding School</option>
                        <option>Day Boarding School</option>
                        <option>Play School</option>
                    </select>



                </div>

            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <label>Class Offered</label>
                    <input class="form-control my-2" name="class">

                </div>
                <div class="col-md-6">
                    <label>Board</label>
                    <select class="form-control my-2" name="board">
                        <option>CBSE</option>
                        <option>ICSE</option>
                        <option>IB</option>
                        <option>IGSCE</option>
                        <option>State Board</option>
                    </select>

                </div>

            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <label>Student faculty ratio</label>
                    <input class="form-control my-2" name="student_faculty">

                </div>

                <div class="col-md-6">
                    <label>Tags</label>
                    <select id="tags" name="tags[]" class="form-control my-2" multiple>

                    </select>

                </div>


            </div>
            <div class="row mt-3">

                <div class="col-md-12">
                    <label>Image</label>
                    <input type="file" class="form-control my-2" name="image">



                </div>

            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="states">Select a State:</label>
                    <select id="states" class="form-control my-2" name="state">
                        <option value="" disabled selected>-- Select a State --</option>
                        <option value="andhra-pradesh">Andhra Pradesh</option>
                        <option value="arunachal-pradesh">Arunachal Pradesh</option>
                        <option value="assam">Assam</option>
                        <option value="bihar">Bihar</option>
                        <option value="chhattisgarh">Chhattisgarh</option>
                        <option value="goa">Goa</option>
                        <option value="gujarat">Gujarat</option>
                        <option value="haryana">Haryana</option>
                        <option value="himachal-pradesh">Himachal Pradesh</option>
                        <option value="jharkhand">Jharkhand</option>
                        <option value="karnataka">Karnataka</option>
                        <option value="kerala">Kerala</option>
                        <option value="madhya-pradesh">Madhya Pradesh</option>
                        <option value="maharashtra">Maharashtra</option>
                        <option value="manipur">Manipur</option>
                        <option value="meghalaya">Meghalaya</option>
                        <option value="mizoram">Mizoram</option>
                        <option value="nagaland">Nagaland</option>
                        <option value="odisha">Odisha</option>
                        <option value="punjab">Punjab</option>
                        <option value="rajasthan">Rajasthan</option>
                        <option value="sikkim">Sikkim</option>
                        <option value="tamil-nadu">Tamil Nadu</option>
                        <option value="telangana">Telangana</option>
                        <option value="tripura">Tripura</option>
                        <option value="uttar-pradesh">Uttar Pradesh</option>
                        <option value="uttarakhand">Uttarakhand</option>
                        <option value="west-bengal">West Bengal</option>
                        <option value="andaman-nicobar">Andaman and Nicobar Islands</option>
                        <option value="chandigarh">Chandigarh</option>
                        <option value="dadra-nagar-haveli-daman-diu">Dadra and Nagar Haveli and Daman and Diu</option>
                        <option value="delhi">Delhi</option>
                        <option value="jammu-kashmir">Jammu and Kashmir</option>
                        <option value="ladakh">Ladakh</option>
                        <option value="lakshadweep">Lakshadweep</option>
                        <option value="puducherry">Puducherry</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Select your city</label>
                    <input type="text" name="city" id="searchbox" class="form-control my-2" placeholder="Type your city..." autocomplete="off">
                    <div id="suggestions"></div>

                </div>

            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <lable>Address</lable>
                    <textarea class="form-control my-3" name="address" placeholder="Enter the Address"></textarea>

                </div>


            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary mt-3 w-25 ">Submit</button>
            </div>

        </form>

    </div>
    <div id="tab2" class="content">
        <h2 class="text-center">Overview Details</h2>
        <form method="post" action="{{route('overviewdetails')}}">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <label class="text-dark font-weight-bold">Content</label>
                    <textarea class="form-control" style="height:150px" name="content" placeholder="Enter the Content"></textarea>


                </div>
            </div>
            <div class="row mt-5">
                <div class='col-md-6'>
                    <label>Ownership</label>
                    <select name="ownership" class="form-control" name="ownership">
                        <option value="Private">Private</option>
                        <option value="Private AIDED">Private AIDED</option>
                    </select>



                </div>
                <div class="col-md-6">
                    <label>Year of establishment</label>
                    <input class="form-control" name="establishment" placheholder="enter year of establishment">

                </div>

            </div>
            <div class="row mt-5">
                <div class="col-md-6">
                    <label>Campus size</label>
                    <input placeholder="enter campus size" name="campus_size" class="form-control">

                </div>
                <div class="col-md-6">
                    <label>Campus type</label>
                    <input placehold="enter campus type" name="campus_type" class="form-control">

                </div>

            </div>
            <div class="row mt-5">
                <div class="col-md-6">
                    <label class="">Language of intraction</label>
                    <select class="form-control" name="language">
                        <option>Hindi</option>
                        <option>English</option>
                    </select>


                </div>
                <div class="col-md-6">
                    <label>Academic Session</label>
                    <input class="form-control" name="academic_session" placeholder="enter academic session">


                </div>

            </div>
            <div class="row mt-5">
                <div class="col-md-6">
                    <label>Select School format</label>
                    <select id="format" class="form-control py-2" style="width:100%!important" name="school_format[]" multiple>
                        <option>Day School</option>
                        <option>Boarding School</option>
                        <option>Day Boarding School</option>
                        <option>Play School</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Co-Ed Status</label>
                    <input class="form-control" name="Co_ed_status">

                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6">
                    <label>Video Link</label>
                    <input name="videolink" class="form-control"></input>
                </div>
                <div class="col-md-6 d-flex flex-column">
                    <label>Board</label>
                    <select class="form-control" name="board">

                        <option value="CBSE">
                            CBSE
                        </option>
                        <option value="ICSE">ICSE</option>
                        <option value="IB">IB</option>
                        <option value="IGSCE">IGSCE</option>
                        <option value="state Board">State Board</option>

                    </select>
                </div>



            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-primary mt-3 w-25">Submit</button>

            </div>

        </form>
    </div>





    <div id="tab3" class="content">
        <div class="row">
            <div class="col-md-12">
                <select id="classSelector" class="form-control">
                    <option value="Prenursery">Prenursey</option>
                    <option value="Nursery">Nursery</option>
                    <option value="LKG">LKG</option>
                    <option value="UKG">UKG</option>
                    <option value="I">Class I</option>
                    <option value="II">Class II</option>
                    <option value="III">Class III</option>
                    <option value="IV">Class IV</option>
                    <option value="V">Class V</option>
                    <option value="VI">Class VI</option>
                    <option value="VII">Class VII</option>
                    <option value="VIII">Class VIII</option>
                    <option value="IX">Class IX</option>
                    <option value="X">Class X</option>
                    <option value="XI">Class XI</option>
                    <option value="XII">Class XII</option>

                </select>
            </div>

        </div>

        <div id="Prenursery" class="classDiv my-5" style="display: block;">
            <form class="formfee" method="post" action="{{route('addclassfee')}}">
                @csrf
                <input type="hidden" value="Prenursery" name="class">
                <h4 class="text-center">Class Prenursey</h4>
                <div class="row">

                    <div class="col-md-6">
                        <label>Registration Fee</label>
                        <input name="refee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="refre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Admission Fee</label>
                        <input list="options" name="adfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="adfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Tution Fee</label>
                        <input name="tutfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="tutfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Security Fee</label>
                        <input value="NA" name="secfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="secfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Annual Fee</label>
                        <input value="NA" name="anufee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="anufre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Transportation Fee</label>
                        <input value="NA" name="transfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="transfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Others Fee</label>
                        <input value="NA" name="otherfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="otherfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>

                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Total Cost</label>
                        <input name="totalfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="totalfre">
                            <option>Onetime</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Monthly Cost</label>
                        <input name="monthlyfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">
                        <!-- <datalist id="options" class="w-100 ">
                            <option class="w-100" value="NA">NA</option>

                        </datalist> -->
                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="monthlyfre">
                            <option>Onetime</option>
                            <option>Monthly</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label>Availbale</label>
                        <select name="available" class="form-control">
                            <option value="yes">yes</option>
                            <option value="no">NO</option>
                        </select>
                    </div>

                </div>

                <div class="d-flex justify-content-center mt-5">
                    <button class="btn btn-success w-25">Submit</button>

                </div>





            </form>

        </div>


        <!-- class Nursery -->
        <div id="Nursery" class="classDiv my-5" style="display: none;">
            <form class="formfee" method="post" action="{{route('addclassfee')}}">
                @csrf
                <input type="hidden" value="Nursery" name="class">
                <h4 class="text-center">Class Nursery</h4>
                <div class="row">

                    <div class="col-md-6">
                        <label>Registration Fee</label>
                        <input name="refee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="refre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Admission Fee</label>
                        <input list="options" name="adfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="adfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Tution Fee</label>
                        <input name="tutfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="tutfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Security Fee</label>
                        <input value="NA" name="secfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="secfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Annual Fee</label>
                        <input value="NA" name="anufee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="anufre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Transportation Fee</label>
                        <input value="NA" name="transfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="transfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Others Fee</label>
                        <input value="NA" name="otherfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="otherfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>

                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Total Cost</label>
                        <input name="totalfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="totalfre">
                            <option>Onetime</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Monthly Cost</label>
                        <input name="monthlyfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">
                        <!-- <datalist id="options" class="w-100 ">
                            <option class="w-100" value="NA">NA</option>

                        </datalist> -->
                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="monthlyfre">
                            <option>Onetime</option>
                            <option>Monthly</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label>Availbale</label>
                        <select name="available" class="form-control">
                            <option value="yes">yes</option>
                            <option value="no">NO</option>
                        </select>
                    </div>

                </div>

                <div class="d-flex justify-content-center mt-5">
                    <button class="btn btn-success w-25">Submit</button>

                </div>





            </form>
        </div>
        <div id="LKG" class="classDiv my-5" style="display: none;">
            <form class="formfee" method="post" action="{{route('addclassfee')}}">
                @csrf
                <input type="hidden" value="LKG" name="class">
                <h4 class="text-center">Class LKG</h4>
                <div class="row">

                    <div class="col-md-6">
                        <label>Registration Fee</label>
                        <input name="refee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="refre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Admission Fee</label>
                        <input list="options" name="adfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="adfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Tution Fee</label>
                        <input name="tutfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="tutfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Security Fee</label>
                        <input value="NA" name="secfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="secfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Annual Fee</label>
                        <input value="NA" name="anufee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="anufre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Transportation Fee</label>
                        <input value="NA" name="transfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="transfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Others Fee</label>
                        <input value="NA" name="otherfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="otherfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>

                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Total Cost</label>
                        <input name="totalfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="totalfre">
                            <option>Onetime</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Monthly Cost</label>
                        <input name="monthlyfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">
                        <!-- <datalist id="options" class="w-100 ">
                            <option class="w-100" value="NA">NA</option>

                        </datalist> -->
                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="monthlyfre">
                            <option>Onetime</option>
                            <option>Monthly</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">
                     <div class="col-md-12">
                           <label>Availbale</label>
                           <select name="available" class="form-control">
                            <option value="yes">yes</option>
                            <option value="no">NO</option>
                           </select>
                     </div>

                </div>

                <div class="d-flex justify-content-center mt-5">
                    <button class="btn btn-success w-25">Submit</button>

                </div>





            </form>


        </div>
        <div id="UKG" class="classDiv my-5" style="display: none;">
            <form class="formfee" method="post" action="{{route('addclassfee')}}">
                @csrf
                <input type="hidden" value="UKG" name="class">
                <h4 class="text-center">Class UKG</h4>
                <div class="row">

                    <div class="col-md-6">
                        <label>Registration Fee</label>
                        <input name="refee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="refre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Admission Fee</label>
                        <input list="options" name="adfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="adfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Tution Fee</label>
                        <input name="tutfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="tutfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Security Fee</label>
                        <input value="NA" name="secfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="secfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Annual Fee</label>
                        <input value="NA" name="anufee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="anufre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Transportation Fee</label>
                        <input value="NA" name="transfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="transfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Others Fee</label>
                        <input value="NA" name="otherfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="otherfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>

                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Total Cost</label>
                        <input name="totalfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="totalfre">
                            <option>Onetime</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Monthly Cost</label>
                        <input name="monthlyfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">
                        <!-- <datalist id="options" class="w-100 ">
                            <option class="w-100" value="NA">NA</option>

                        </datalist> -->
                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="monthlyfre">
                            <option>Onetime</option>
                            <option>Monthly</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label>Availbale</label>
                        <select name="available" class="form-control">
                            <option value="yes">yes</option>
                            <option value="no">NO</option>
                        </select>
                    </div>

                </div>
                <div class="d-flex justify-content-center mt-5">
                    <button class="btn btn-success w-25">Submit</button>

                </div>





            </form>



        </div>
        <div id="I" class="classDiv my-5" style="display: none;">
            <form class="formfee" method="post" action="{{route('addclassfee')}}">
                @csrf
                <input type="hidden" value="I" name="class">
                <h4 class="text-center">Class I</h4>
                <div class="row">

                    <div class="col-md-6">
                        <label>Registration Fee</label>
                        <input name="refee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="refre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Admission Fee</label>
                        <input list="options" name="adfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="adfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Tution Fee</label>
                        <input name="tutfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="tutfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Security Fee</label>
                        <input value="NA" name="secfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="secfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Annual Fee</label>
                        <input value="NA" name="anufee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="anufre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Transportation Fee</label>
                        <input value="NA" name="transfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="transfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Others Fee</label>
                        <input value="NA" name="otherfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="otherfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>

                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Total Cost</label>
                        <input name="totalfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="totalfre">
                            <option>Onetime</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Monthly Cost</label>
                        <input name="monthlyfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">
                        <!-- <datalist id="options" class="w-100 ">
                            <option class="w-100" value="NA">NA</option>

                        </datalist> -->
                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="monthlyfre">
                            <option>Onetime</option>
                            <option>Monthly</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label>Availbale</label>
                        <select name="available" class="form-control">
                            <option value="yes">yes</option>
                            <option value="no">NO</option>
                        </select>
                    </div>

                </div>
                <div class="d-flex justify-content-center mt-5">
                    <button class="btn btn-success w-25">Submit</button>

                </div>





            </form>

        </div>
        <div id="II" class="classDiv my-5" style="display: none;">
            <form class="formfee" method="post" action="{{route('addclassfee')}}">
                @csrf
                <input type="hidden" value="II" name="class">
                <h4 class="text-center">Class II</h4>
                <div class="row">

                    <div class="col-md-6">
                        <label>Registration Fee</label>
                        <input name="refee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="refre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Admission Fee</label>
                        <input list="options" name="adfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="adfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Tution Fee</label>
                        <input name="tutfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="tutfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Security Fee</label>
                        <input value="NA" name="secfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="secfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Annual Fee</label>
                        <input value="NA" name="anufee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="anufre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Transportation Fee</label>
                        <input value="NA" name="transfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="transfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Others Fee</label>
                        <input value="NA" name="otherfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="otherfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>

                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Total Cost</label>
                        <input name="totalfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="totalfre">
                            <option>Onetime</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Monthly Cost</label>
                        <input name="monthlyfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">
                        <!-- <datalist id="options" class="w-100 ">
                            <option class="w-100" value="NA">NA</option>

                        </datalist> -->
                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="monthlyfre">
                            <option>Onetime</option>
                            <option>Monthly</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label>Availbale</label>
                        <select name="available" class="form-control">
                            <option value="yes">yes</option>
                            <option value="no">NO</option>
                        </select>
                    </div>

                </div>
                <div class="d-flex justify-content-center mt-5">
                    <button class="btn btn-success w-25">Submit</button>

                </div>





            </form>
        </div>
        <div id="III" class="classDiv my-5" style="display: none;">
            <form class="formfee" method="post" action="{{route('addclassfee')}}">
                @csrf
                <input type="hidden" value="III" name="class">
                <h4 class="text-center">Class III</h4>
                <div class="row">

                    <div class="col-md-6">
                        <label>Registration Fee</label>
                        <input name="refee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="refre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Admission Fee</label>
                        <input list="options" name="adfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="adfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Tution Fee</label>
                        <input name="tutfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="tutfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Security Fee</label>
                        <input value="NA" name="secfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="secfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Annual Fee</label>
                        <input value="NA" name="anufee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="anufre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Transportation Fee</label>
                        <input value="NA" name="transfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="transfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Others Fee</label>
                        <input value="NA" name="otherfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="otherfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>

                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Total Cost</label>
                        <input name="totalfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="totalfre">
                            <option>Onetime</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Monthly Cost</label>
                        <input name="monthlyfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">
                        <!-- <datalist id="options" class="w-100 ">
                            <option class="w-100" value="NA">NA</option>

                        </datalist> -->
                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="monthlyfre">
                            <option>Onetime</option>
                            <option>Monthly</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label>Availbale</label>
                        <select name="available" class="form-control">
                            <option value="yes">yes</option>
                            <option value="no">NO</option>
                        </select>
                    </div>

                </div>

                <div class="d-flex justify-content-center mt-5">
                    <button class="btn btn-success w-25">Submit</button>

                </div>





            </form>
        </div>
        <div id="IV" class="classDiv my-5" style="display: none;">
            <form class="formfee" method="post" action="{{route('addclassfee')}}">
                @csrf
                <input type="hidden" value="IV" name="class">
                <h4 class="text-center">Class IV</h4>
                <div class="row">

                    <div class="col-md-6">
                        <label>Registration Fee</label>
                        <input name="refee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="refre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Admission Fee</label>
                        <input list="options" name="adfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="adfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Tution Fee</label>
                        <input name="tutfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="tutfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Security Fee</label>
                        <input value="NA" name="secfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="secfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Annual Fee</label>
                        <input value="NA" name="anufee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="anufre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Transportation Fee</label>
                        <input value="NA" name="transfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="transfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Others Fee</label>
                        <input value="NA" name="otherfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="otherfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>

                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Total Cost</label>
                        <input name="totalfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="totalfre">
                            <option>Onetime</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Monthly Cost</label>
                        <input name="monthlyfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">
                        <!-- <datalist id="options" class="w-100 ">
                            <option class="w-100" value="NA">NA</option>

                        </datalist> -->
                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="monthlyfre">
                            <option>Onetime</option>
                            <option>Monthly</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label>Availbale</label>
                        <select name="available" class="form-control">
                            <option value="yes">yes</option>
                            <option value="no">NO</option>
                        </select>
                    </div>

                </div>
                <div class="d-flex justify-content-center mt-5">
                    <button class="btn btn-success w-25">Submit</button>

                </div>





            </form>
        </div>
        <div id="V" class="classDiv my-5" style="display: none;">
            <form class="formfee" method="post" action="{{route('addclassfee')}}">
                @csrf
                <input type="hidden" value="V" name="class">
                <h4 class="text-center">Class V</h4>
                <div class="row">

                    <div class="col-md-6">
                        <label>Registration Fee</label>
                        <input name="refee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="refre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Admission Fee</label>
                        <input list="options" name="adfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="adfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Tution Fee</label>
                        <input name="tutfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="tutfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Security Fee</label>
                        <input value="NA" name="secfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="secfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Annual Fee</label>
                        <input value="NA" name="anufee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="anufre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Transportation Fee</label>
                        <input value="NA" name="transfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="transfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Others Fee</label>
                        <input value="NA" name="otherfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="otherfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>

                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Total Cost</label>
                        <input name="totalfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="totalfre">
                            <option>Onetime</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Monthly Cost</label>
                        <input name="monthlyfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">
                        <!-- <datalist id="options" class="w-100 ">
                            <option class="w-100" value="NA">NA</option>

                        </datalist> -->
                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="monthlyfre">
                            <option>Onetime</option>
                            <option>Monthly</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label>Availbale</label>
                        <select name="available" class="form-control">
                            <option value="yes">yes</option>
                            <option value="no">NO</option>
                        </select>
                    </div>

                </div>
                <div class="d-flex justify-content-center mt-5">
                    <button class="btn btn-success w-25">Submit</button>

                </div>





            </form>
        </div>
        <div id="VI" class="classDiv my-5" style="display: none;">
            <form class="formfee" method="post" action="{{route('addclassfee')}}">
                @csrf
                <input type="hidden" value="VI" name="class">
                <h4 class="text-center">Class VI</h4>
                <div class="row">

                    <div class="col-md-6">
                        <label>Registration Fee</label>
                        <input name="refee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="refre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Admission Fee</label>
                        <input list="options" name="adfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="adfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Tution Fee</label>
                        <input name="tutfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="tutfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Security Fee</label>
                        <input value="NA" name="secfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="secfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Annual Fee</label>
                        <input value="NA" name="anufee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="anufre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Transportation Fee</label>
                        <input value="NA" name="transfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="transfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Others Fee</label>
                        <input value="NA" name="otherfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="otherfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>

                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Total Cost</label>
                        <input name="totalfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="totalfre">
                            <option>Onetime</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Monthly Cost</label>
                        <input name="monthlyfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">
                        <!-- <datalist id="options" class="w-100 ">
                            <option class="w-100" value="NA">NA</option>

                        </datalist> -->
                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="monthlyfre">
                            <option>Onetime</option>
                            <option>Monthly</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label>Availbale</label>
                        <select name="available" class="form-control">
                            <option value="yes">yes</option>
                            <option value="no">NO</option>
                        </select>
                    </div>

                </div>
                <div class="d-flex justify-content-center mt-5">
                    <button class="btn btn-success w-25">Submit</button>

                </div>





            </form>
        </div>
        <div id="VII" class="classDiv my-5" style="display: none;">
            <form class="formfee" method="post" action="{{route('addclassfee')}}">
                @csrf
                <input type="hidden" value="VII" name="class">
                <h4 class="text-center">Class VII</h4>
                <div class="row">

                    <div class="col-md-6">
                        <label>Registration Fee</label>
                        <input name="refee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="refre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Admission Fee</label>
                        <input list="options" name="adfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="adfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Tution Fee</label>
                        <input name="tutfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="tutfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Security Fee</label>
                        <input value="NA" name="secfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="secfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Annual Fee</label>
                        <input value="NA" name="anufee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="anufre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Transportation Fee</label>
                        <input value="NA" name="transfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="transfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Others Fee</label>
                        <input value="NA" name="otherfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="otherfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>

                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Total Cost</label>
                        <input name="totalfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="totalfre">
                            <option>Onetime</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Monthly Cost</label>
                        <input name="monthlyfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">
                        <!-- <datalist id="options" class="w-100 ">
                            <option class="w-100" value="NA">NA</option>

                        </datalist> -->
                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="monthlyfre">
                            <option>Onetime</option>
                            <option>Monthly</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label>Availbale</label>
                        <select name="available" class="form-control">
                            <option value="yes">yes</option>
                            <option value="no">NO</option>
                        </select>
                    </div>

                </div>
                <div class="d-flex justify-content-center mt-5">
                    <button class="btn btn-success w-25">Submit</button>

                </div>





            </form>
        </div>
        <div id="VIII" class="classDiv my-5" style="display: none;">
            <form class="formfee" method="post" action="{{route('addclassfee')}}">
                @csrf
                <input type="hidden" value="VIII" name="class">
                <h4 class="text-center">Class VIII</h4>
                <div class="row">

                    <div class="col-md-6">
                        <label>Registration Fee</label>
                        <input name="refee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="refre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Admission Fee</label>
                        <input list="options" name="adfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="adfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Tution Fee</label>
                        <input name="tutfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="tutfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Security Fee</label>
                        <input value="NA" name="secfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="secfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Annual Fee</label>
                        <input value="NA" name="anufee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="anufre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Transportation Fee</label>
                        <input value="NA" name="transfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="transfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Others Fee</label>
                        <input value="NA" name="otherfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="otherfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>

                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Total Cost</label>
                        <input name="totalfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="totalfre">
                            <option>Onetime</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Monthly Cost</label>
                        <input name="monthlyfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">
                        <!-- <datalist id="options" class="w-100 ">
                            <option class="w-100" value="NA">NA</option>

                        </datalist> -->
                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="monthlyfre">
                            <option>Onetime</option>
                            <option>Monthly</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label>Availbale</label>
                        <select name="available" class="form-control">
                            <option value="yes">yes</option>
                            <option value="no">NO</option>
                        </select>
                    </div>

                </div>

                <div class="d-flex justify-content-center mt-5">
                    <button class="btn btn-success w-25">Submit</button>

                </div>





            </form>
        </div>
        <div id="IX" class="classDiv my-5" style="display: none;">
            <form class="formfee" method="post" action="{{route('addclassfee')}}">
                @csrf
                <input type="hidden" value="IX" name="class">
                <h4 class="text-center">Class IX</h4>
                <div class="row">

                    <div class="col-md-6">
                        <label>Registration Fee</label>
                        <input name="refee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="refre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Admission Fee</label>
                        <input list="options" name="adfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="adfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Tution Fee</label>
                        <input name="tutfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="tutfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Security Fee</label>
                        <input value="NA" name="secfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="secfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Annual Fee</label>
                        <input value="NA" name="anufee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="anufre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Transportation Fee</label>
                        <input value="NA" name="transfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="transfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Others Fee</label>
                        <input value="NA" name="otherfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="otherfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>

                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Total Cost</label>
                        <input name="totalfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="totalfre">
                            <option>Onetime</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Monthly Cost</label>
                        <input name="monthlyfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">
                        <!-- <datalist id="options" class="w-100 ">
                            <option class="w-100" value="NA">NA</option>

                        </datalist> -->
                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="monthlyfre">
                            <option>Onetime</option>
                            <option>Monthly</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">
                     <div class="col-md-12">
                           <label>Availbale</label>
                           <select name="available" class="form-control">
                            <option value="yes">yes</option>
                            <option value="no">NO</option>
                           </select>
                     </div>

                </div>
                <div class="d-flex justify-content-center mt-5">
                    <button class="btn btn-success w-25">Submit</button>

                </div>





            </form>
        </div>
        <div id="X" class="classDiv my-5" style="display: none;">
            <form class="formfee" method="post" action="{{route('addclassfee')}}">
                @csrf
                <input type="hidden" value="X" name="class">
                <h4 class="text-center">Class X</h4>
                <div class="row">

                    <div class="col-md-6">
                        <label>Registration Fee</label>
                        <input name="refee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="refre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Admission Fee</label>
                        <input list="options" name="adfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="adfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Tution Fee</label>
                        <input name="tutfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="tutfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Security Fee</label>
                        <input value="NA" name="secfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="secfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Annual Fee</label>
                        <input value="NA" name="anufee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="anufre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Transportation Fee</label>
                        <input value="NA" name="transfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="transfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Others Fee</label>
                        <input value="NA" name="otherfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="otherfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>

                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Total Cost</label>
                        <input name="totalfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="totalfre">
                            <option>Onetime</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Monthly Cost</label>
                        <input name="monthlyfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">
                        <!-- <datalist id="options" class="w-100 ">
                            <option class="w-100" value="NA">NA</option>

                        </datalist> -->
                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="monthlyfre">
                            <option>Onetime</option>
                            <option>Monthly</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">
                     <div class="col-md-12">
                           <label>Availbale</label>
                           <select name="available" class="form-control">
                            <option value="yes">yes</option>
                            <option value="no">NO</option>
                           </select>
                     </div>

                </div>
                <div class="d-flex justify-content-center mt-5">
                    <button class="btn btn-success w-25">Submit</button>

                </div>





            </form>
        </div>
        <div id="XI" class="classDiv my-5" style="display: none;">
            <form class="formfee" method="post" action="{{route('addclassfee')}}">
                @csrf
                <input type="hidden" value="XI" name="class">
                <h4 class="text-center">Class XI</h4>
                <div class="row">

                    <div class="col-md-6">
                        <label>Registration Fee</label>
                        <input name="refee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="refre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Admission Fee</label>
                        <input list="options" name="adfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="adfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Tution Fee</label>
                        <input name="tutfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="tutfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Security Fee</label>
                        <input value="NA" name="secfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="secfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Annual Fee</label>
                        <input value="NA" name="anufee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="anufre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Transportation Fee</label>
                        <input value="NA" name="transfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="transfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Others Fee</label>
                        <input value="NA" name="otherfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="otherfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>

                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Total Cost</label>
                        <input name="totalfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="totalfre">
                            <option>Onetime</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Monthly Cost</label>
                        <input name="monthlyfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">
                        <!-- <datalist id="options" class="w-100 ">
                            <option class="w-100" value="NA">NA</option>

                        </datalist> -->
                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="monthlyfre">
                            <option>Onetime</option>
                            <option>Monthly</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">
                     <div class="col-md-12">
                           <label>Availbale</label>
                           <select name="available" class="form-control">
                            <option value="yes">yes</option>
                            <option value="no">NO</option>
                           </select>
                     </div>

                </div>
                <div class="d-flex justify-content-center mt-5">
                    <button class="btn btn-success w-25">Submit</button>

                </div>





            </form>
        </div>
        <div id="XII" class="classDiv my-5" style="display: none;">
            <form class="formfee" method="post" action="{{route('addclassfee')}}">
                @csrf
                <input type="hidden" value="XII" name="class">
                <h4 class="text-center">Class XII</h4>
                <div class="row">

                    <div class="col-md-6">
                        <label>Registration Fee</label>
                        <input name="refee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="refre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Admission Fee</label>
                        <input list="options" name="adfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="adfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Tution Fee</label>
                        <input name="tutfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="tutfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Security Fee</label>
                        <input value="NA" name="secfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="secfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Annual Fee</label>
                        <input value="NA" name="anufee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="anufre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Transportation Fee</label>
                        <input value="NA" name="transfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="transfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Others Fee</label>
                        <input value="NA" name="otherfee" id="customInput" class="form-control" placeholder="Enter or select a value">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="otherfre">
                            <option>Onetime</option>
                            <option>Quaterly</option>
                            <option>Monthly</option>
                            <option>Half yearly</option>
                            <option>Yearly</option>
                            <option selected>NA</option>
                        </select>

                    </div>



                </div>

                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Total Cost</label>
                        <input name="totalfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">

                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="totalfre">
                            <option>Onetime</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Monthly Cost</label>
                        <input name="monthlyfee" id="customInput" class="form-control" placeholder="Enter or select a value" value="NA">
                        <!-- <datalist id="options" class="w-100 ">
                            <option class="w-100" value="NA">NA</option>

                        </datalist> -->
                    </div>
                    <div class="col-md-6">
                        <label>frequency</label>
                        <select class="form-control" name="monthlyfre">
                            <option>Onetime</option>
                            <option>Monthly</option>

                            <option selected>NA</option>
                        </select>

                    </div>



                </div>
                <div class="row mt-3">
                     <div class="col-md-12">
                           <label>Availbale</label>
                           <select name="available" class="form-control">
                            <option value="yes">yes</option>
                            <option value="no">NO</option>
                           </select>
                     </div>

                </div>

                <div class="d-flex justify-content-center mt-5">
                    <button class="btn btn-success w-25">Submit</button>

                </div>





            </form>
        </div>


    </div>

    <!-- this is the eligibity container -->
    <div id="tab4" class="content">
        <div class="row">
            <div class="col-md-12">
                <select id="classSelector_eligibilty" class="form-control">
                    <option value="Prenursery_eligibility">Prenursey</option>
                    <option value="Nursery_eligibility">Nursery</option>
                    <option value="LKG_eligibility">LKG</option>
                    <option value="UKG_eligibility">UKG</option>
                    <option value="I_eligibility">Class I</option>
                    <option value="II_eligibility">Class II</option>
                    <option value="III_eligibility">Class III</option>
                    <option value="IV_eligibility">Class IV</option>
                    <option value="V_eligibility">Class V</option>
                    <option value="VI_eligibility">Class VI</option>
                    <option value="VII_eligibility">Class VII</option>
                    <option value="VIII_eligibility">Class VIII</option>
                    <option value="IX_eligibility">Class IX</option>
                    <option value="X_eligibility">Class X</option>
                    <option value="XI_eligibility">Class XI</option>
                    <option value="XII_eligibility">Class XII</option>


                </select>
            </div>



            <div class="container">
                <div id="Prenursery_eligibility" class="tab_eligibility my-5" style="display:block;">

                    <form class="form_eligibility" method="post" action="{{route('addeligibity')}}">
                        @csrf
                        <h4 class="text-center">Class Prenursery</h4>
                        <input type="hidden" value="Prenursery" name="class">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Eligibility(Age Qualification)</label>
                                <input class="form-control" name="eliag" placeholder="Please enter a value" value="NA">



                            </div>
                            <div class="col-md-6">
                                <label>Eligibility(Marks)</label>
                                <input class="form-control" name="elmarks" placeholder="Please enter a value" value="NA">

                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Total Seats</label>
                                <input class="form-control" name="elseats" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Written Test</label>
                                <select class="form-control" name="eltest">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>


                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Student's Interaction</label>
                                <input class="form-control" name="elstudent" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Parent's Interaction</label>
                                <select class="form-control" name="elparent">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Form Availability</label>
                                <select class="form-control" name="elform">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option>OFF</option>
                                    <option selected>NA</option>

                                </select>


                            </div>
                            <div class="col-md-6">
                                <label>Form payment</label>
                                <select class="form-control" name="elformpayment">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <label>School Timings</label><br>
                                <label>From</label>
                                <input type="time" name="eltimefrom" class="form-control" value="00:00">
                                <label>To</label>
                                <input type="time" name="eltimeto" class="form-control" value="00:00">




                            </div>


                        </div>
                        <div class="mt-5 d-flex justify-content-center">
                            <button class="btn btn-success w-25">Submit</button>

                        </div>

                    </form>


                </div>
                <div id="Nursery_eligibility" class="tab_eligibility my-5" style="display: none;">
                    <form class="form_eligibility" method="post" action="{{route('addeligibity')}}">
                        @csrf
                        <h4 class="text-center">Class Nursery</h4>
                        <input type="hidden" value="Nursery" name="class">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Eligibility(Age Qualification)</label>
                                <input class="form-control" name="eliag" placeholder="Please enter a value" value="NA">



                            </div>
                            <div class="col-md-6">
                                <label>Eligibility(Marks)</label>
                                <input class="form-control" name="elmarks" placeholder="Please enter a value" value="NA">

                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Total Seats</label>
                                <input class="form-control" name="elseats" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Written Test</label>
                                <select class="form-control" name="eltest">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>


                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Student's Interaction</label>
                                <input class="form-control" name="elstudent" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Parent's Interaction</label>
                                <select class="form-control" name="elparent">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Form Availability</label>
                                <select class="form-control" name="elform">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option>OFF</option>
                                    <option selected>NA</option>

                                </select>


                            </div>
                            <div class="col-md-6">
                                <label>Form payment</label>
                                <select class="form-control" name="elformpayment">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <label>School Timings</label><br>
                                <label>From</label>
                                <input type="time" name="eltimefrom" class="form-control" value="00:00">
                                <label>To</label>
                                <input type="time" name="eltimeto" class="form-control" value="00:00">




                            </div>


                        </div>
                        <div class="mt-5 d-flex justify-content-center">
                            <button class="btn btn-success w-25">Submit</button>

                        </div>

                    </form>
                </div>
                <div id="LKG_eligibility" class="tab_eligibility my-5" style="display: none;">
                    <form class="form_eligibility" method="post" action="{{route('addeligibity')}}">
                        @csrf
                        <h4 class="text-center">Class LKG</h4>
                        <input type="hidden" value="LKG" name="class">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Eligibility(Age Qualification)</label>
                                <input class="form-control" name="eliag" placeholder="Please enter a value" value="NA">



                            </div>
                            <div class="col-md-6">
                                <label>Eligibility(Marks)</label>
                                <input class="form-control" name="elmarks" placeholder="Please enter a value" value="NA">

                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Total Seats</label>
                                <input class="form-control" name="elseats" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Written Test</label>
                                <select class="form-control" name="eltest">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>


                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Student's Interaction</label>
                                <input class="form-control" name="elstudent" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Parent's Interaction</label>
                                <select class="form-control" name="elparent">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Form Availability</label>
                                <select class="form-control" name="elform">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option>OFF</option>
                                    <option selected>NA</option>

                                </select>


                            </div>
                            <div class="col-md-6">
                                <label>Form payment</label>
                                <select class="form-control" name="elformpayment">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <label>School Timings</label><br>
                                <label>From</label>
                                <input type="time" name="eltimefrom" class="form-control" value="00:00">
                                <label>To</label>
                                <input type="time" name="eltimeto" class="form-control" value="00:00">




                            </div>


                        </div>
                        <div class="mt-5 d-flex justify-content-center">
                            <button class="btn btn-success w-25">Submit</button>

                        </div>

                    </form>
                </div>
                <div id="UKG_eligibility" class="tab_eligibility my-5" style="display: none;">
                    <form class="form_eligibility" method="post" action="{{route('addeligibity')}}">
                        @csrf
                        <h4 class="text-center">Class UKG</h4>
                        <input type="hidden" value="UKG" name="class">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Eligibility(Age Qualification)</label>
                                <input class="form-control" name="eliag" placeholder="Please enter a value" value="NA">



                            </div>
                            <div class="col-md-6">
                                <label>Eligibility(Marks)</label>
                                <input class="form-control" name="elmarks" placeholder="Please enter a value" value="NA">

                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Total Seats</label>
                                <input class="form-control" name="elseats" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Written Test</label>
                                <select class="form-control" name="eltest">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>


                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Student's Interaction</label>
                                <input class="form-control" name="elstudent" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Parent's Interaction</label>
                                <select class="form-control" name="elparent">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Form Availability</label>
                                <select class="form-control" name="elform">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option>OFF</option>
                                    <option selected>NA</option>

                                </select>


                            </div>
                            <div class="col-md-6">
                                <label>Form payment</label>
                                <select class="form-control" name="elformpayment">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <label>School Timings</label><br>
                                <label>From</label>
                                <input type="time" name="eltimefrom" class="form-control" value="00:00">
                                <label>To</label>
                                <input type="time" name="eltimeto" class="form-control" value="00:00">




                            </div>


                        </div>
                        <div class="mt-5 d-flex justify-content-center">
                            <button class="btn btn-success w-25">Submit</button>

                        </div>

                    </form>
                </div>
                <div id="I_eligibility" class="tab_eligibility my-5" style="display: none;">
                    @csrf
                    <form class="form_eligibility" method="post" action="{{route('addeligibity')}}">
                        @csrf
                        <h4 class="text-center">Class I</h4>
                        <input type="hidden" value="I" name="class">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Eligibility(Age Qualification)</label>
                                <input class="form-control" name="eliag" placeholder="Please enter a value" value="NA">



                            </div>
                            <div class="col-md-6">
                                <label>Eligibility(Marks)</label>
                                <input class="form-control" name="elmarks" placeholder="Please enter a value" value="NA">

                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Total Seats</label>
                                <input class="form-control" name="elseats" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Written Test</label>
                                <select class="form-control" name="eltest">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>


                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Student's Interaction</label>
                                <input class="form-control" name="elstudent" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Parent's Interaction</label>
                                <select class="form-control" name="elparent">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Form Availability</label>
                                <select class="form-control" name="elform">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option>OFF</option>
                                    <option selected>NA</option>

                                </select>


                            </div>
                            <div class="col-md-6">
                                <label>Form payment</label>
                                <select class="form-control" name="elformpayment">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <label>School Timings</label><br>
                                <label>From</label>
                                <input type="time" name="eltimefrom" class="form-control" value="00:00">
                                <label>To</label>
                                <input type="time" name="eltimeto" class="form-control" value="00:00">




                            </div>


                        </div>
                        <div class="mt-5 d-flex justify-content-center">
                            <button class="btn btn-success w-25">Submit</button>

                        </div>

                    </form>


                </div>
                <div id="II_eligibility" class="tab_eligibility my-5" style="display: none;">
                    <form class="form_eligibility" method="post" action="{{route('addeligibity')}}">
                        @csrf
                        <h4 class="text-center">Class II</h4>
                        <input type="hidden" value="II" name="class">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Eligibility(Age Qualification)</label>
                                <input class="form-control" name="eliag" placeholder="Please enter a value" value="NA">



                            </div>
                            <div class="col-md-6">
                                <label>Eligibility(Marks)</label>
                                <input class="form-control" name="elmarks" placeholder="Please enter a value" value="NA">

                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Total Seats</label>
                                <input class="form-control" name="elseats" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Written Test</label>
                                <select class="form-control" name="eltest">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>


                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Student's Interaction</label>
                                <input class="form-control" name="elstudent" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Parent's Interaction</label>
                                <select class="form-control" name="elparent">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Form Availability</label>
                                <select class="form-control" name="elform">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option>OFF</option>
                                    <option selected>NA</option>

                                </select>


                            </div>
                            <div class="col-md-6">
                                <label>Form payment</label>
                                <select class="form-control" name="elformpayment">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <label>School Timings</label><br>
                                <label>From</label>
                                <input type="time" name="eltimefrom" class="form-control" value="00:00">
                                <label>To</label>
                                <input type="time" name="eltimeto" class="form-control" value="00:00">




                            </div>


                        </div>
                        <div class="mt-5 d-flex justify-content-center">
                            <button class="btn btn-success w-25">Submit</button>

                        </div>

                    </form>

                </div>
                <div id="III_eligibility" class="tab_eligibility my-5" style="display: none;">
                    <form class="form_eligibility" method="post" action="{{route('addeligibity')}}">
                        @csrf
                        <h4 class="text-center">Class III</h4>
                        <input type="hidden" value="III" name="class">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Eligibility(Age Qualification)</label>
                                <input class="form-control" name="eliag" placeholder="Please enter a value" value="NA">



                            </div>
                            <div class="col-md-6">
                                <label>Eligibility(Marks)</label>
                                <input class="form-control" name="elmarks" placeholder="Please enter a value" value="NA">

                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Total Seats</label>
                                <input class="form-control" name="elseats" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Written Test</label>
                                <select class="form-control" name="eltest">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>


                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Student's Interaction</label>
                                <input class="form-control" name="elstudent" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Parent's Interaction</label>
                                <select class="form-control" name="elparent">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Form Availability</label>
                                <select class="form-control" name="elform">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option>OFF</option>
                                    <option selected>NA</option>

                                </select>


                            </div>
                            <div class="col-md-6">
                                <label>Form payment</label>
                                <select class="form-control" name="elformpayment">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <label>School Timings</label><br>
                                <label>From</label>
                                <input type="time" name="eltimefrom" class="form-control" value="00:00">
                                <label>To</label>
                                <input type="time" name="eltimeto" class="form-control" value="00:00">




                            </div>


                        </div>
                        <div class="mt-5 d-flex justify-content-center">
                            <button class="btn btn-success w-25">Submit</button>

                        </div>

                    </form>
                </div>
                <div id="IV_eligibility" class="tab_eligibility my-5" style="display: none;">
                    <form class="form_eligibility" method="post" action="{{route('addeligibity')}}">
                        @csrf
                        <h4 class="text-center">Class IV</h4>
                        <input type="hidden" value="IV" name="class">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Eligibility(Age Qualification)</label>
                                <input class="form-control" name="eliag" placeholder="Please enter a value" value="NA">



                            </div>
                            <div class="col-md-6">
                                <label>Eligibility(Marks)</label>
                                <input class="form-control" name="elmarks" placeholder="Please enter a value" value="NA">

                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Total Seats</label>
                                <input class="form-control" name="elseats" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Written Test</label>
                                <select class="form-control" name="eltest">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>


                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Student's Interaction</label>
                                <input class="form-control" name="elstudent" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Parent's Interaction</label>
                                <select class="form-control" name="elparent">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Form Availability</label>
                                <select class="form-control" name="elform">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option>OFF</option>
                                    <option selected>NA</option>

                                </select>


                            </div>
                            <div class="col-md-6">
                                <label>Form payment</label>
                                <select class="form-control" name="elformpayment">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <label>School Timings</label><br>
                                <label>From</label>
                                <input type="time" name="eltimefrom" class="form-control" value="00:00">
                                <label>To</label>
                                <input type="time" name="eltimeto" class="form-control" value="00:00">




                            </div>


                        </div>
                        <div class="mt-5 d-flex justify-content-center">
                            <button class="btn btn-success w-25">Submit</button>

                        </div>

                    </form>
                </div>
                <div id="V_eligibility" class="tab_eligibility my-5" style="display: none;">
                    <form class="form_eligibility" method="post" action="{{route('addeligibity')}}">
                        @csrf
                        <h4 class="text-center">Class V</h4>
                        <input type="hidden" value="V" name="class">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Eligibility(Age Qualification)</label>
                                <input class="form-control" name="eliag" placeholder="Please enter a value" value="NA">



                            </div>
                            <div class="col-md-6">
                                <label>Eligibility(Marks)</label>
                                <input class="form-control" name="elmarks" placeholder="Please enter a value" value="NA">

                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Total Seats</label>
                                <input class="form-control" name="elseats" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Written Test</label>
                                <select class="form-control" name="eltest">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>


                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Student's Interaction</label>
                                <input class="form-control" name="elstudent" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Parent's Interaction</label>
                                <select class="form-control" name="elparent">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Form Availability</label>
                                <select class="form-control" name="elform">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option>OFF</option>
                                    <option selected>NA</option>

                                </select>


                            </div>
                            <div class="col-md-6">
                                <label>Form payment</label>
                                <select class="form-control" name="elformpayment">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <label>School Timings</label><br>
                                <label>From</label>
                                <input type="time" name="eltimefrom" class="form-control" value="00:00">
                                <label>To</label>
                                <input type="time" name="eltimeto" class="form-control" value="00:00">




                            </div>


                        </div>
                        <div class="mt-5 d-flex justify-content-center">
                            <button class="btn btn-success w-25">Submit</button>

                        </div>

                    </form>
                </div>
                <div id="VI_eligibility" class="tab_eligibility my-5" style="display: none;">
                    <form class="form_eligibility" method="post" action="{{route('addeligibity')}}">
                        @csrf
                        <h4 class="text-center">Class VI</h4>
                        <input type="hidden" value="VI" name="class">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Eligibility(Age Qualification)</label>
                                <input class="form-control" name="eliag" placeholder="Please enter a value" value="NA">



                            </div>
                            <div class="col-md-6">
                                <label>Eligibility(Marks)</label>
                                <input class="form-control" name="elmarks" placeholder="Please enter a value" value="NA">

                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Total Seats</label>
                                <input class="form-control" name="elseats" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Written Test</label>
                                <select class="form-control" name="eltest">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>


                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Student's Interaction</label>
                                <input class="form-control" name="elstudent" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Parent's Interaction</label>
                                <select class="form-control" name="elparent">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Form Availability</label>
                                <select class="form-control" name="elform">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option>OFF</option>
                                    <option selected>NA</option>

                                </select>


                            </div>
                            <div class="col-md-6">
                                <label>Form payment</label>
                                <select class="form-control" name="elformpayment">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <label>School Timings</label><br>
                                <label>From</label>
                                <input type="time" name="eltimefrom" class="form-control" value="00:00">
                                <label>To</label>
                                <input type="time" name="eltimeto" class="form-control" value="00:00">




                            </div>


                        </div>
                        <div class="mt-5 d-flex justify-content-center">
                            <button class="btn btn-success w-25">Submit</button>

                        </div>

                    </form>
                </div>
                <div id="VII_eligibility" class="tab_eligibility my-5" style="display: none;">
                    <form class="form_eligibility" method="post" action="{{route('addeligibity')}}">
                        @csrf
                        <h4 class="text-center">Class VII</h4>
                        <input type="hidden" value="VII" name="class">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Eligibility(Age Qualification)</label>
                                <input class="form-control" name="eliag" placeholder="Please enter a value" value="NA">



                            </div>
                            <div class="col-md-6">
                                <label>Eligibility(Marks)</label>
                                <input class="form-control" name="elmarks" placeholder="Please enter a value" value="NA">

                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Total Seats</label>
                                <input class="form-control" name="elseats" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Written Test</label>
                                <select class="form-control" name="eltest">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>


                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Student's Interaction</label>
                                <input class="form-control" name="elstudent" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Parent's Interaction</label>
                                <select class="form-control" name="elparent">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Form Availability</label>
                                <select class="form-control" name="elform">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option>OFF</option>
                                    <option selected>NA</option>

                                </select>


                            </div>
                            <div class="col-md-6">
                                <label>Form payment</label>
                                <select class="form-control" name="elformpayment">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <label>School Timings</label><br>
                                <label>From</label>
                                <input type="time" name="eltimefrom" class="form-control" value="00:00">
                                <label>To</label>
                                <input type="time" name="eltimeto" class="form-control" value="00:00">




                            </div>


                        </div>
                        <div class="mt-5 d-flex justify-content-center">
                            <button class="btn btn-success w-25">Submit</button>

                        </div>

                    </form>
                </div>
                <div id="VIII_eligibility" class="tab_eligibility my-5" style="display: none;">
                    <form class="form_eligibility" method="post" action="{{route('addeligibity')}}">
                        @csrf
                        <h4 class="text-center">Class VIII</h4>
                        <input type="hidden" value="VIII" name="class">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Eligibility(Age Qualification)</label>
                                <input class="form-control" name="eliag" placeholder="Please enter a value" value="NA">



                            </div>
                            <div class="col-md-6">
                                <label>Eligibility(Marks)</label>
                                <input class="form-control" name="elmarks" placeholder="Please enter a value" value="NA">

                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Total Seats</label>
                                <input class="form-control" name="elseats" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Written Test</label>
                                <select class="form-control" name="eltest">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>


                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Student's Interaction</label>
                                <input class="form-control" name="elstudent" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Parent's Interaction</label>
                                <select class="form-control" name="elparent">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Form Availability</label>
                                <select class="form-control" name="elform">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option>OFF</option>
                                    <option selected>NA</option>

                                </select>


                            </div>
                            <div class="col-md-6">
                                <label>Form payment</label>
                                <select class="form-control" name="elformpayment">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <label>School Timings</label><br>
                                <label>From</label>
                                <input type="time" name="eltimefrom" class="form-control" value="00:00">
                                <label>To</label>
                                <input type="time" name="eltimeto" class="form-control" value="00:00">




                            </div>


                        </div>
                        <div class="mt-5 d-flex justify-content-center">
                            <button class="btn btn-success w-25">Submit</button>

                        </div>

                    </form>
                </div>
                <div id="IX_eligibility" class="tab_eligibility my-5" style="display: none;">
                    <form class="form_eligibility" method="post" action="{{route('addeligibity')}}">
                        @csrf
                        <h4 class="text-center">Class IX</h4>
                        <input type="hidden" value="IX" name="class">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Eligibility(Age Qualification)</label>
                                <input class="form-control" name="eliag" placeholder="Please enter a value" value="NA">



                            </div>
                            <div class="col-md-6">
                                <label>Eligibility(Marks)</label>
                                <input class="form-control" name="elmarks" placeholder="Please enter a value" value="NA">

                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Total Seats</label>
                                <input class="form-control" name="elseats" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Written Test</label>
                                <select class="form-control" name="eltest">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>


                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Student's Interaction</label>
                                <input class="form-control" name="elstudent" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Parent's Interaction</label>
                                <select class="form-control" name="elparent">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Form Availability</label>
                                <select class="form-control" name="elform">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option>OFF</option>
                                    <option selected>NA</option>

                                </select>


                            </div>
                            <div class="col-md-6">
                                <label>Form payment</label>
                                <select class="form-control" name="elformpayment">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <label>School Timings</label><br>
                                <label>From</label>
                                <input type="time" name="eltimefrom" class="form-control" value="00:00">
                                <label>To</label>
                                <input type="time" name="eltimeto" class="form-control" value="00:00">




                            </div>


                        </div>
                        <div class="mt-5 d-flex justify-content-center">
                            <button class="btn btn-success w-25">Submit</button>

                        </div>

                    </form>
                </div>
                <div id="X_eligibility" class="tab_eligibility my-5" style="display: none;">
                    <form class="form_eligibility" method="post" action="{{route('addeligibity')}}">
                        @csrf
                        <h4 class="text-center">Class X</h4>
                        <input type="hidden" value="X" name="class">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Eligibility(Age Qualification)</label>
                                <input class="form-control" name="eliag" placeholder="Please enter a value" value="NA">



                            </div>
                            <div class="col-md-6">
                                <label>Eligibility(Marks)</label>
                                <input class="form-control" name="elmarks" placeholder="Please enter a value" value="NA">

                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Total Seats</label>
                                <input class="form-control" name="elseats" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Written Test</label>
                                <select class="form-control" name="eltest">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>


                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Student's Interaction</label>
                                <input class="form-control" name="elstudent" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Parent's Interaction</label>
                                <select class="form-control" name="elparent">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Form Availability</label>
                                <select class="form-control" name="elform">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option>OFF</option>
                                    <option selected>NA</option>

                                </select>


                            </div>
                            <div class="col-md-6">
                                <label>Form payment</label>
                                <select class="form-control" name="elformpayment">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <label>School Timings</label><br>
                                <label>From</label>
                                <input type="time" name="eltimefrom" class="form-control" value="00:00">
                                <label>To</label>
                                <input type="time" name="eltimeto" class="form-control" value="00:00">




                            </div>


                        </div>
                        <div class="mt-5 d-flex justify-content-center">
                            <button class="btn btn-success w-25">Submit</button>

                        </div>

                    </form>
                </div>
                <div id="XI_eligibility" class="tab_eligibility my-5" style="display: none;">
                    <form class="form_eligibility" method="post" action="{{route('addeligibity')}}">
                        @csrf
                        <h4 class="text-center">Class XI</h4>
                        <input type="hidden" value="XI" name="class">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Eligibility(Age Qualification)</label>
                                <input class="form-control" name="eliag" placeholder="Please enter a value" value="NA">



                            </div>
                            <div class="col-md-6">
                                <label>Eligibility(Marks)</label>
                                <input class="form-control" name="elmarks" placeholder="Please enter a value" value="NA">

                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Total Seats</label>
                                <input class="form-control" name="elseats" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Written Test</label>
                                <select class="form-control" name="eltest">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>


                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Student's Interaction</label>
                                <input class="form-control" name="elstudent" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Parent's Interaction</label>
                                <select class="form-control" name="elparent">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Form Availability</label>
                                <select class="form-control" name="elform">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option>OFF</option>
                                    <option selected>NA</option>

                                </select>


                            </div>
                            <div class="col-md-6">
                                <label>Form payment</label>
                                <select class="form-control" name="elformpayment">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <label>School Timings</label><br>
                                <label>From</label>
                                <input type="time" name="eltimefrom" class="form-control" value="00:00">
                                <label>To</label>
                                <input type="time" name="eltimeto" class="form-control" value="00:00">




                            </div>


                        </div>
                        <div class="mt-5 d-flex justify-content-center">
                            <button class="btn btn-success w-25">Submit</button>

                        </div>

                    </form>
                </div>
                <div id="XII_eligibility" class="tab_eligibility my-5" style="display: none;">
                    <form class="form_eligibility" method="post" action="{{route('addeligibity')}}">
                        @csrf
                        <h4 class="text-center">Class XII</h4>
                        <input type="hidden" value="XII" name="class">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Eligibility(Age Qualification)</label>
                                <input class="form-control" name="eliag" placeholder="Please enter a value" value="NA">



                            </div>
                            <div class="col-md-6">
                                <label>Eligibility(Marks)</label>
                                <input class="form-control" name="elmarks" placeholder="Please enter a value" value="NA">

                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Total Seats</label>
                                <input class="form-control" name="elseats" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Written Test</label>
                                <select class="form-control" name="eltest">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>


                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Student's Interaction</label>
                                <input class="form-control" name="elstudent" value="NA" placeholder="Please enter a value">



                            </div>
                            <div class="col-md-6">
                                <label>Parent's Interaction</label>
                                <select class="form-control" name="elparent">
                                    <option>Yes</option>
                                    <option>NO</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>Form Availability</label>
                                <select class="form-control" name="elform">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option>OFF</option>
                                    <option selected>NA</option>

                                </select>


                            </div>
                            <div class="col-md-6">
                                <label>Form payment</label>
                                <select class="form-control" name="elformpayment">
                                    <option>Online</option>
                                    <option>Offline</option>
                                    <option selected>NA</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <label>School Timings</label><br>
                                <label>From</label>
                                <input type="time" name="eltimefrom" class="form-control" value="00:00">
                                <label>To</label>
                                <input type="time" name="eltimeto" class="form-control" value="00:00">




                            </div>


                        </div>
                        <div class="mt-5 d-flex justify-content-center">
                            <button class="btn btn-success w-25">Submit</button>

                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
    <div id="tab5" class="content">
        <form method="post" action="{{route('addfacilities')}}">
            @csrf
            <div class="row">
                <div class="col-md-6 d-flex flex-column">
                    <label>Class Facilities</label>

                    <select class="form-control" id="class_facilities" name="class_facilities[]" multiple></select>

                </div>
                <div class="col-md-6 d-flex flex-column">
                    <label>Boarding</label>
                    <select class="form-control" id="boarding" name="boarding[]" multiple>
                        <option value="Boys Hostel">Boys Hostel</option>
                        <option value="Girls hostel">Girls Hostel</option>
                        <option vlaue="NA">NA</option>

                    </select>

                </div>

            </div>
            <div class="row mt-5">
                <div class="col-md-6 d-flex flex-column">
                    <label>Infrastructure</label>
                    <select id="infrastructure" class="form-control" name="infrastructure[]" multiple></select>

                </div>
                <div class="col-md-6 d-flex flex-column">
                    <label>Safety and Security</label>
                    <select id="safetyandsecurity" class="form-control" name="safety_and_security[]" multiple></select>

                </div>

            </div>
            <div class="row mt-5">

                <div class="col-md-6 d-flex flex-column">
                    <label>Advance Facilties</label>
                    <select class="form-control" id="advance_facilites" name="advancefacilties[]" multiple>

                    </select>

                </div>
                <div class="col-md-6 d-flex flex-column">
                    <label>Exatracurricular Activities</label>
                    <select class="form-control" name="extra_cur[]" id="extracurricular" multiple></select>
                </div>


            </div>
            <div class="row mt-5">
                <div class="col-md-6 d-flex flex-column">
                    <label>Sports and Fitness</label>
                    <select class="form-control" name="sports_and_fitness[]" id="sports_and_fitness" multiple></select>

                </div>
                <div class="col-md-6 d-flex flex-column">
                    <label>Lab</label>
                    <select class="form-control" name="lab[]
                " multiple id="lab"></select>


                </div>

            </div>
            <div class="row mt-5">
                <div class="col-md-12 d-flex flex-column">
                    <label>Disabled friendly</label>
                    <select class="form-control" name="disabled_friendly">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                        <option value="NA">NA</option>

                    </select>

                </div>

            </div>


            <div class="d-flex justify-content-center">
                <button class="btn btn-success mt-5 w-25">
                    submit

                </button>

            </div>
        </form>


    </div>
    <div id="tab6" class="content">
        <div class="container ">
            <form method="post" action="{{route('addimages')}}" enctype="multipart/form-data">
                @csrf
                <select class="form-control" name="category">
                    <option value="infrastructure">Infrastructure</option>
                    <option value="classroom">Classroom</option>
                    <option value="library">Library</option>
                    <option value="playground">Playground</option>

                </select>

                <input type="file" name="image" placeholder="select the images" class="form-control mt-5"></input>
                <div class="d-flex justify-content-center mt-5">
                    <button class="btn btn-success w-25">Submit</button>

                </div>
            </form>



        </div>
    </div>


    <script>
        $("#class_facilities").select2({
            placeholder: "Add facilties",
            tags: true,
            allowClear: true

        });
        $("#advance_facilites").select2({
            placeholder: "type advance facilties",
            tags: true,
            allowClear: true
        })
        $("#boarding").select2({
            placeholder: "Select Boarding",
            tags: "true",
            allowClear: true

        })

        $("#infrastructure").select2({
            placeholder: "type infrastructure",
            tags: "true",
            allowClear: true
        })
        $("#safetyandsecurity").select2({
            placeholder: "type safety and security",
            tags: "true",
            allowClear: true
        })
        $("#extracurricular").select2({
            placeholder: "type extracurricular activities",
            tags: true,
            allowClear: true

        })
        $("#sports_and_fitness").select2({
            placeholder: "type sports and fitness",
            tags: true,
            allowClear: true
        })
        $("#lab").select2({
            placeholder: "type the lab",
            tags: true,
            allowClear: true
        })
        // safetyandsecurityJavaScript to show/hide divs based on selection
        const classSelector = document.getElementById('classSelector');
        const classDivs = document.querySelectorAll('.classDiv');

        classSelector.addEventListener('change', function() {
            // Hide all divs
            classDivs.forEach(div => div.style.display = 'none');

            // Show the selected div
            const selectedValue = classSelector.value;
            const selectedDiv = document.getElementById(selectedValue);
            if (selectedDiv) {
                selectedDiv.style.display = 'block';
            }
        });
    </script>
    <script>
        // JavaScript for switching tabs and content

        // $("#submitbasic_detail").on("submit", function(e) {
        //     e.preventDefault(); // Prevent the default form submission behavior
        //     console.log("rohit");
        //     // Select all elements with class 'tab' and remove 'active' class
        //     const tabs = document.querySelectorAll('.tab');
        //     tabs.forEach(tab => tab.classList.remove('active'));

        //     // Select all elements with class 'content' and remove 'active-content' class
        //     const contents = document.querySelectorAll('.content');
        //     contents.forEach(content => content.classList.remove('active-content'));



        //     // Additional code (if needed) to handle the next steps after form submission
        //     var target1 = $("#tabbing2");
        //     target1.addClass('active'); // Adds 'active' class using jQuery
        //     var target2 = $("#tab2");
        //     target2.addClass('active-content');




        // });
        const form = document.getElementById("submitbasic_detail");
        $("#format").select2({
            placeholder: "Select a category", // Set the placeholder text
            allowClear: true, // Enable clear button to remove the selection
            tags: true

        })

        $(".formfee").on("submit", function(e) {
            e.preventDefault(); // Prevents the default form submission

            var formData = $(this).serialize(); // Serialize the form data

            $.ajax({
                url: $(this).attr('action'), // The URL to send the form data to
                type: 'POST', // HTTP method (POST)
                data: formData, // The form data to send
                success: function(response) {
                    $(".tab").removeClass("active");
                    $("#tabbing3").addClass("active");
                    $(".content").removeClass("active-content")
                    $("#tab3").addClass("active-content");
                    if (response.classfee == "Prenursery") {
                        console.log("raftar");
                        $("#classSelector").val("Nursery");
                        $(".classDiv").css("display", "none");
                        $("#Nursery").css("display", "block");
                    } else if (response.classfee == "Nursery") {

                        $("#classSelector").val("UKG");
                        $(".classDiv").css("display", "none");
                        $("#UKG").css("display", "block");
                    } else if (response.classfee == "UKG") {
                        $("#classSelector").val("LKG");
                        $(".classDiv").css("display", "none");
                        $("#LKG").css("display", "block");
                    } else if (response.classfee == "LKG") {

                        $("#classSelector").val("I");
                        $(".classDiv").css("display", "none");
                        $("#I").css("display", "block");
                    } else if (response.classfee == "I") {

                        $("#classSelector").val("II");
                        $(".classDiv").css("display", "none");
                        $("#II").css("display", "block");
                    } else if (response.classfee == "II") {

                        $("#classSelector").val("III");
                        $(".classDiv").css("display", "none");
                        $("#III").css("display", "block");
                    } else if (response.classfee == "III") {

                        $("#classSelector").val("IV");
                        $(".classDiv").css("display", "none");
                        $("#IV").css("display", "block");
                    } else if (response.classfee == "IV") {

                        $("#classSelector").val("V");
                        $(".classDiv").css("display", "none");
                        $("#V").css("display", "block");
                    } else if (response.classfee == "V") {

                        $("#classSelector").val("VI");
                        $(".classDiv").css("display", "none");
                        $("#VI").css("display", "block");
                    } else if (response.classfee == "VI") {

                        $("#classSelector").val("VII");
                        $(".classDiv").css("display", "none");
                        $("#VII").css("display", "block");
                    } else if (response.classfee == "VII") {

                        $("#classSelector").val("VIII");
                        $(".classDiv").css("display", "none");
                        $("#VIII").css("display", "block");
                    } else if (response.classfee == "VIII") {

                        $("#classSelector").val("IX");
                        $(".classDiv").css("display", "none");
                        $("#IX").css("display", "block");
                    } else if (response.classfee == "IX") {

                        $("#classSelector").val("X");
                        $(".classDiv").css("display", "none");
                        $("#X").css("display", "block");
                    } else if (response.classfee == "X") {

                        $("#classSelector").val("XI");
                        $(".classDiv").css("display", "none");
                        $("#XI").css("display", "block");
                    } else if (response.classfee == "XI") {

                        $("#classSelector").val("XII");
                        $(".classDiv").css("display", "none");
                        $("#XII").css("display", "block");
                    } else if (response.classfee == "XII") {

                        $(".tab").removeClass("active");
                        $("#tabbing4").addClass("active");
                        $(".content").removeClass("active-content")
                        $("#tab4").addClass("active-content");
                    }

                    Swal.fire({
                        title: "Success",
                        text: `Class ${response.classfee} successfully added`,
                        icon: "success"
                    }).then(() => {
                        // Force scroll to the top
                        document.documentElement.scrollTop = 0; // This directly sets the scroll position to the top
                        document.body.scrollTop = 0; // For Safari compatibility
                    });


                },
                error: function(xhr, status, error) {
                    // Handle errors
                    alert("An error occurred: " + error);
                    console.error(error);
                }
            });
        })
        $(".form_eligibility").on("submit", function(e) {
            e.preventDefault(); // Prevents the default form submission

            var formData = $(this).serialize(); // Serialize the form data

            $.ajax({
                url: $(this).attr('action'), // The URL to send the form data to
                type: 'POST', // HTTP method (POST)
                data: formData, // The form data to send
                success: function(response) {
                    $(".tab").removeClass("active");
                    $("#tabbing4").addClass("active");
                    $(".content").removeClass("active-content")
                    $("#tab4").addClass("active-content");
                    if (response.class_eligibility == "Prenursery") {
                        $(".tab_eligibility").css("display", "none");
                        $('#Nursery_eligibility').css("display", "block");
                        $("#classSelector_eligibilty").val("Nursery_eligibility");
                    } else if (response.class_eligibility == "Nursery") {
                        $(".tab_eligibility").css("display", "none");
                        $('#LKG_eligibility').css("display", "block");
                        $("#classSelector_eligibilty").val("LKG_eligibility");
                    } else if (response.class_eligibility == "LKG") {
                        $(".tab_eligibility").css("display", "none");
                        $('#UKG_eligibility').css("display", "block");
                        $("#classSelector_eligibilty").val("UKG_eligibility");
                    } else if (response.class_eligibility == "UKG") {
                        $(".tab_eligibility").css("display", "none");
                        $('#I_eligibility').css("display", "block");
                        $("#classSelector_eligibilty").val("I_eligibility");
                    } else if (response.class_eligibility == "I") {
                        $(".tab_eligibility").css("display", "none");
                        $('#II_eligibility').css("display", "block");
                        $("#classSelector_eligibilty").val("II_eligibility");
                    } else if (response.class_eligibility == "II") {
                        $(".tab_eligibility").css("display", "none");
                        $('#III_eligibility').css("display", "block");
                        $("#classSelector_eligibilty").val("III_eligibility");
                    } else if (response.class_eligibility == "III") {
                        $(".tab_eligibility").css("display", "none");
                        $('#IV_eligibility').css("display", "block");
                        $("#classSelector_eligibilty").val("IV_eligibility");
                    } else if (response.class_eligibility == "IV") {
                        $(".tab_eligibility").css("display", "none");
                        $('#V_eligibility').css("display", "block");
                        $("#classSelector_eligibilty").val("V_eligibility");
                    } else if (response.class_eligibility == "V") {
                        $(".tab_eligibility").css("display", "none");
                        $('#VI_eligibility').css("display", "block");
                        $("#classSelector_eligibilty").val("VI_eligibility");
                    } else if (response.class_eligibility == "VI") {
                        $(".tab_eligibility").css("display", "none");
                        $('#VII_eligibility').css("display", "block");
                        $("#classSelector_eligibilty").val("VII_eligibility");
                    } else if (response.class_eligibility == "VII") {
                        $(".tab_eligibility").css("display", "none");
                        $('#VIII_eligibility').css("display", "block");
                        $("#classSelector_eligibilty").val("VIII_eligibility");
                    } else if (response.class_eligibility == "VIII") {
                        $(".tab_eligibility").css("display", "none");
                        $('#IX_eligibility').css("display", "block");
                        $("#classSelector_eligibilty").val("IX_eligibility");
                    } else if (response.class_eligibility == "IX") {
                        $(".tab_eligibility").css("display", "none");
                        $('#X_eligibility').css("display", "block");
                        $("#classSelector_eligibilty").val("X_eligibility");
                    } else if (response.class_eligibility == "X") {
                        $(".tab_eligibility").css("display", "none");
                        $('#XI_eligibility').css("display", "block");
                        $("#classSelector_eligibilty").val("XI_eligibility");
                    } else if (response.class_eligibility == "XI") {
                        $(".tab_eligibility").css("display", "none");
                        $('#XII_eligibility').css("display", "block");
                        $("#classSelector_eligibilty").val("XII_eligibility");
                    } else if (response.class_eligibility == "XII") {
                        $(".tab").removeClass("active");
                        $("#tabbing5").addClass("active");
                        $(".content").removeClass("active-content")
                        $("#tab5").addClass("active-content");
                    }




                    Swal.fire({
                        title: "Success",
                        text: `Class ${response.class_eligibility} eligibillity  successfully added`,
                        icon: "success"
                    }).then(() => {
                        // Force scroll to the top
                        document.documentElement.scrollTop = 0; // This directly sets the scroll position to the top
                        document.body.scrollTop = 0; // For Safari compatibility
                    });


                },
                error: function(xhr, status, error) {
                    // Handle errors
                    alert("An error occurred: " + error);
                    console.error(error);
                }
            });


        })



        // form.addEventListener("submit", async (event) => {
        //     event.preventDefault(); // Prevent default submission

        //     const formData = new FormData(form); // Collect form data
        //     const actionUrl = form.getAttribute("action");

        //     try {
        //         const response = await fetch(actionUrl, {
        //             method: "POST",
        //             body: formData,
        //             headers: {
        //                 "X-Requested-With": "XMLHttpRequest",
        //                 "Accept": "application/json",
        //             },
        //         });

        //         if (!response.ok) {
        //             throw new Error("Network response was not ok");
        //         }

        //         const result = await response.json();

        //         // Perform any JavaScript operation after successful form submission
        //         alert("Form submitted successfully!");
        //         console.log("Server Response:", result);

        //         // Example JavaScript: Clear the form and hide suggestions
        //         form.reset();
        //         suggestions.innerHTML = "";
        //         suggestions.style.display = "none";
        //     } catch (error) {
        //         console.error("Error during form submission:", error);
        //         alert("An error occurred while submitting the form.");
        //     }
        // });


        // this is for the tab switching for fee
        const tabs = document.querySelectorAll('.tab');
        const contents = document.querySelectorAll('.content');

        tabs.forEach(tab => {
            tab.addEventListener('click', (e) => {
                e.preventDefault();

                // Remove active class from all tabs and contents
                tabs.forEach(t => t.classList.remove('active'));
                contents.forEach(c => c.classList.remove('active-content'));

                // Add active class to the clicked tab and corresponding content
                tab.classList.add('active');
                const target = tab.getAttribute('data-target');
                document.getElementById(target).classList.add('active-content');
            });
        });

        //this isfor th eleigibility switching

        document.getElementById('classSelector_eligibilty').addEventListener('change', function() {
            // Get all tabs
            const tabs = document.querySelectorAll('.tab_eligibility');

            // Hide all tabs
            tabs.forEach(tab => tab.style.display = 'none');

            // Get the selected value
            const selectedValue = this.value;
            console.log(selectedValue);

            // Show the selected tab
            const activeTab = document.getElementById(selectedValue);
            if (activeTab) {
                console.log("active tab");
                activeTab.style.display = 'block';
            }
        });
        $("#category").select2({
            placeholder: "Select a category", // Set the placeholder text
            allowClear: true // Enable clear button to remove the selection
        });


        $("#tags").select2({
            placeholder: "Select a category", // Set the placeholder text
            allowClear: true, // Enable clear button to remove the selection
            tags: true // Allow users to add new options
        });
        // Function to fetch cities from the API
        async function fetchCities(query) {
            const apiKey = "77611d5866mshb33da0d699fcec4p15077ejsn0f08a1c4d078"; // Replace with your RapidAPI key
            const url = `https://wft-geo-db.p.rapidapi.com/v1/geo/cities?namePrefix=${query}&countryIds=IN`;

            try {
                const response = await fetch(url, {
                    method: "GET",
                    headers: {
                        "X-RapidAPI-Key": apiKey,
                        "X-RapidAPI-Host": "wft-geo-db.p.rapidapi.com"
                    }
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }

                const data = await response.json();
                return data.data.map(city => city.name); // Extract city names
            } catch (error) {
                console.error("Error fetching cities:", error);
                return [];
            }
        }

        // Function to display suggestions
        function displaySuggestions(suggestions, searchBox, suggestionsBox) {
            suggestionsBox.innerHTML = ""; // Clear previous suggestions

            if (suggestions.length === 0) {
                suggestionsBox.style.display = "none"; // Hide suggestions if empty
                return;
            }

            suggestionsBox.style.display = "block";
            suggestions.forEach(city => {
                const suggestionDiv = document.createElement("div");
                suggestionDiv.textContent = city;
                suggestionDiv.className = "suggestion-item"; // Add class for styling
                suggestionDiv.addEventListener("click", () => {
                    searchBox.value = city; // Set clicked city to input box
                    suggestionsBox.innerHTML = ""; // Clear suggestions
                    suggestionsBox.style.display = "none";
                });
                suggestionsBox.appendChild(suggestionDiv);
            });
        }

        // Function to handle input with debouncing
        function setupSearchBox(searchBox, suggestionsBox) {
            let debounceTimeout;

            searchBox.addEventListener("input", () => {
                const query = searchBox.value.trim();

                clearTimeout(debounceTimeout); // Clear previous debounce timeout
                if (query) {
                    debounceTimeout = setTimeout(async () => {
                        const cities = await fetchCities(query);
                        displaySuggestions(cities, searchBox, suggestionsBox);
                    }, 500); // Delay API call by 300ms
                } else {
                    suggestionsBox.innerHTML = ""; // Clear suggestions when input is empty
                    suggestionsBox.style.display = "none";
                }
            });

            // Hide suggestions when clicking outside
            document.addEventListener("click", (event) => {
                if (event.target !== searchBox && event.target.closest(".suggestion-item") === null) {
                    suggestionsBox.style.display = "none";
                }
            });
        }

        // Initialize the functionality
        function initCitySearch() {
            const searchBox = document.getElementById("searchbox");
            const suggestionsBox = document.getElementById("suggestions");

            if (searchBox && suggestionsBox) {
                setupSearchBox(searchBox, suggestionsBox);
            } else {
                console.error("Search box or suggestions box not found in DOM.");
            }
        }

        // Initialize on page load
        document.addEventListener("DOMContentLoaded", initCitySearch);
    </script>


    @if(session('basicdetail')||session("success_overview"))
    <script>
        Swal.fire({
            title: "success",
            text: "{{session('basicdetail')}}" || "{{session('success_overview')}}",
            icon: "success"
        });
        var basicDetail = "{{ session('basicdetail') }}";
        var successOverview = "{{ session('success_overview') }}";
        if (basicDetail) {
            $(".tab").removeClass("active");
            $("#tabbing2").addClass("active");
            $(".content").removeClass("active-content")
            $("#tab2").addClass("active-content");
        } else if (successOverview) {
            $(".tab").removeClass("active");
            $("#tabbing3").addClass("active");
            $(".content").removeClass("active-content")
            $("#tab3").addClass("active-content");
        }
    </script>



    @endif









    @if(session("eligibility"))
    <script>
        var classname = "{{session('eligibility')}}";

        $(".tab").removeClass("active");
        $("#tabbing4").addClass("active");
        $(".content").removeClass("active-content")
        $("#tab4").addClass("active-content");

        if (classname == "Prenursery") {
            $(".tab_eligibility").css("display", "none");
            $('#Nursery_eligibility').css("display", "block");
            $("#classSelector_eligibilty").val("Nursery_eligibility");
        } else if (classname == "Nursery") {
            $(".tab_eligibility").css("display", "none");
            $('#LKG_eligibility').css("display", "block");
            $("#classSelector_eligibilty").val("LKG_eligibility");
        } else if (classname == "LKG") {
            $(".tab_eligibility").css("display", "none");
            $('#UKG_eligibility').css("display", "block");
            $("#classSelector_eligibilty").val("UKG_eligibility");
        } else if (classname == "UKG") {
            $(".tab_eligibility").css("display", "none");
            $('#I_eligibility').css("display", "block");
            $("#classSelector_eligibilty").val("I_eligibility");
        } else if (classname == "I") {
            $(".tab_eligibility").css("display", "none");
            $('#II_eligibility').css("display", "block");
            $("#classSelector_eligibilty").val("II_eligibility");
        } else if (classname == "II") {
            $(".tab_eligibility").css("display", "none");
            $('#III_eligibility').css("display", "block");
            $("#classSelector_eligibilty").val("III_eligibility");
        } else if (classname == "III") {
            $(".tab_eligibility").css("display", "none");
            $('#IV_eligibility').css("display", "block");
            $("#classSelector_eligibilty").val("IV_eligibility");
        } else if (classname == "IV") {
            $(".tab_eligibility").css("display", "none");
            $('#V_eligibility').css("display", "block");
            $("#classSelector_eligibilty").val("V_eligibility");
        } else if (classname == "V") {
            $(".tab_eligibility").css("display", "none");
            $('#VI_eligibility').css("display", "block");
            $("#classSelector_eligibilty").val("VI_eligibility");
        } else if (classname == "VI") {
            $(".tab_eligibility").css("display", "none");
            $('#VII_eligibility').css("display", "block");
            $("#classSelector_eligibilty").val("VII_eligibility");
        } else if (classname == "VII") {
            $(".tab_eligibility").css("display", "none");
            $('#VIII_eligibility').css("display", "block");
            $("#classSelector_eligibilty").val("VIII_eligibility");
        } else if (classname == "VIII") {
            $(".tab_eligibility").css("display", "none");
            $('#IX_eligibility').css("display", "block");
            $("#classSelector_eligibilty").val("IX_eligibility");
        } else if (classname == "IX") {
            $(".tab_eligibility").css("display", "none");
            $('#X_eligibility').css("display", "block");
            $("#classSelector_eligibilty").val("X_eligibility");
        } else if (classname == "X") {
            $(".tab_eligibility").css("display", "none");
            $('#XI_eligibility').css("display", "block");
            $("#classSelector_eligibilty").val("XI_eligibility");
        } else if (classname == "XI") {
            $(".tab_eligibility").css("display", "none");
            $('#XII_eligibility').css("display", "block");
            $("#classSelector_eligibilty").val("XII_eligibility");
        } else if (classname == "XII") {
            $(".tab").removeClass("active");
            $("#tabbing5").addClass("active");
            $(".content").removeClass("active-content")
            $("#tab5").addClass("active-content");
        }



        Swal.fire({
            title: "success",
            text: "eligbility add for class {{session('eligibility')}}",
            icon: "success"
        });
    </script>

    @endif
    @if(session('facility'))
    <script>
        $(".tab").removeClass("active");
        $("#tabbing6").addClass("active");
        $(".content").removeClass("active-content")
        $("#tab6").addClass("active-content");
        Swal.fire({
            title: "success",
            text: " {{session('facility')}}",
            icon: "success"
        });
    </script>

    @endif

    @if(session('gallery'))
    <?php print_r(session('infrastructure_images')) ?>
    @endif

    @if(session('successgallery'))

    <script>
        $(".tab").removeClass("active");
        $("#tabbing6").addClass("active");
        $(".content").removeClass("active-content")
        $("#tab6").addClass("active-content");



        Swal.fire({
            title: "success",
            text: " image is inserted in {{session('successgallery')}} category",
            icon: "success"
        });
    </script>



    @endif
    @if(session('finalsuccess'))
    <script>
        Swal.fire({
            title: "success",
            text: "{{session('finalsuccess')}}",
            icon: "success"
        });
    </script>





    @endif
    @if(session('finalerror'))


    <script>
        Swal.fire({
            title: "Error",
            text: "{{session('finalerror')}}",
            icon: "error"
        });
    </script>


    @endif

    @include("layout.footer")