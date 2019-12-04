@extends('layouts.admin')
@section('content')
<link href="{{asset('css/form-css/form-elements.css')}}" rel="stylesheet">
<link href="{{asset('css/form-css/style.css')}}" rel="stylesheet">
<div class="inner-bg">
    <div class="card">
        <div class="row">
            <div class="col-sm-12 col-sm-offset-3 form-box">
                <form enctype="multipart/form-data" action="{{ route("admin.addDeclaration") }}" method="POST" class="registration-form">
                    <fieldset>
                        @csrf
                        @if (session()->has('success'))
                        <div class="alert  alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @elseif(session()->has('error'))
                        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                            {{ session()->get('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Step 1 / 3</h3>
                                <p>PROFORMA Part A</p>
                            </div>
                            <div class="form-top-right">
                                <i class="fab fa-wpforms nav-icon"></i>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <div class="form-group">
                                <h4>1. Company Details</h4>
                                <label class="control-label">(a) Name of the Company(As Registered)</label>
                                <input maxlength="100" name="companyname" type="text" class="form-control"
                                       placeholder="Enter Name of the Company(As Registered)" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">(b) CIN No</label>
                                <input name="cin_no" maxlength="100" type="text" class="form-control"
                                       placeholder="Enter CIN No" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">(c) Number of Directors</label>
                                <select name="no_of_directors" class="form-control selector" id="number_of_directors">
                                    <option value="">Select number of Directors</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <h4>2. Details of Registration(With Jurisdiction)</h4>
                                <label class="control-label">(a) Address of Registered office</label>
                                <textarea name="registeration_address" placeholder="Address of Registered office"
                                          class="form-control" id="regofficeaddrss" autocomplete="off"
                                          spellcheck="false"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label">(b) Email id</label>
                                <input type="email" name="registeration_email" placeholder="Email Id" class="form-email form-control"
                                       id="email" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label class="control-label">(c) Telephone No</label>
                                <input type="text" name="registeration_telephone" onkeypress="return numbersonly(event);" placeholder="Telephone No" class="form-control"
                                       id="telephone" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label class="control-label">(d) Company Website</label>
                                <input type="text" name="registeration_companywebsite" placeholder="Company website"
                                       class="form-control" id="companywebsite" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label class="control-label">(e) Details of Other registration(With jurisdiction), if
                                    any(Attach copy of Registration Certificate)</label>
                                <label class="btn btn-info" for="selectFile">Please select your file</label>
                                <span id="fileLabel"></span>
                                <input type="file" name="registeration_file" class=" sr-only" id="selectFile">
                            </div>
                            <div class="form-group">
                                <label class="control-label">(f) Type of Entity</label>
                                <select name="registeration_type_of_entity" class="form-control selector" id="tofentity">
                                    <option value="">Select Entity Type</option>
                                    <option value="Private">Private</option>
                                    <option value="Public">Public</option>
                                    <option value="Trust">Trust</option>
                                    <option value="Ltd">Ltd</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <h4>3. Head Office</h4>
                            <div class="form-group">
                                <label class="control-label">(a) Head Office Address</label>
                                <textarea name="head_office_address" placeholder="Address" class="form-control has-error" id="hoffaddress"
                                          autocomplete="off"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label">(b) Head office email id</label>
                                <input type="email" name="head_office_email" placeholder="Head office Email Id"
                                       class="form-email form-control" id="hoemail" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label class="control-label">(c) Details of key Management Personnel as per registration
                                    under Companies Act</label>
                                <textarea name="head_office_key_management"
                                          placeholder="Details of key Management Personnel as per registration under Compnaies Act"
                                          class="form-control has-error" id="detailsofkm" autocomplete="off"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label">(d) Details of Regional Offices</label>
                                <textarea name="head_office_regoffice" placeholder="Details of Regional Offices"
                                          class="form-control has-error" id="head_office_regoffice" autocomplete="off"></textarea>
                            </div>
                            <label class="control-label">(e) Nodal Officers for Interacting With D/o Consumer
                                Affairs</label>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="control-label">(i) Name of Nodal Officer</label>
                                    <input type="text" name="head_office_nodaloffc_name" placeholder="Name of Nodal Officer"
                                           class="form-control" id="nameofnodaloffcr" autocomplete="off">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label">(ii) Designation of Nodal Officer</label>
                                    <input type="text" name="head_office_nodaloffc_designation" placeholder="Designation of Nodal Officer"
                                           class="form-control" id="designaofnodaloffcr" autocomplete="off">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label">(iii) Telephone of Nodal Officer</label>
                                    <input type="text" name="head_office_nodaloffc_tel" placeholder="Telephone of Nodal Officer"
                                           class="form-control" id="telofnodaloffcr" autocomplete="off">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label">(iv) Email of Nodal Officer</label>
                                    <input type="email" name="head_office_nodaloffc_email" placeholder="Email of Nodal Officer"
                                           class="form-control" id="emailofnodaloffcr" autocomplete="off">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label">(v) Fax of Nodal Officer</label>
                                    <input type="text" name="head_office_nodaloffc_fax" placeholder="Fax of Nodal Officer"
                                           class="form-control" id="faxofnodaloffcr" autocomplete="off">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label">(vi) Mobile No of Nodal Officer</label>
                                    <input type="text" name="head_office_nodaloffc_mob" placeholder="Mobile No of Nodal Officer"
                                           class="form-control" id="mobileofnodaloffcr" autocomplete="off">
                                </div>
                            </div>
                            <hr style="border: 1px solid #000">
                            <div class="form-group">
                                <label class="control-label"><strong>4.</strong> Whether anyone from the management was
                                    convicted by any court in the past within the past 5 years(from the date of
                                    application). If so, the details thereof</label>
                                <textarea name="management_court_details" autocomplete="off"
                                          placeholder="Whether anyone from the management was convicted by any court in the past within the past 5 years(from the date of application). If so, the details thereof;"
                                          class="form-control has-error" id="Managementcourtdetails"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label"><strong>5.</strong> Nature of sale</label>
                                <select name="type_of_selling" class="form-control selector" id="typeofselling">
                                    <option value="">Type of Selling</option>
                                    <option value="Products">Products</option>
                                    <option value="Services">Services</option>
                                    <option value="Both(Products,services)">Both(Products,Services)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label"><strong>6.</strong> Details of License(s), Trade Mark or
                                    Principal Brand Which Identifies the Company</label>
                                <textarea name="details_of_company_identity"
                                          placeholder="Details of License(s), Trade Mark or Principal Brand Which Identifieas the Company"
                                          autocomplete="off" class="form-control has-error" id="detailsoflictrade"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label"><strong>7.</strong> (a) Address / Telephone No / email etc
                                    of Customer Care and Grievance Redress Cells(HQ &amp; Branches)</label>
                                <textarea name="details_of_customercare"
                                          placeholder="Address / Telephone No / email etc of Customer Care and Grievance Redress Cells(HQ &amp; Branches)"
                                          autocomplete="off" class="form-control has-error" id="detailsofgrredresscell"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label">(b) Details of Consumer Grievance Redress Committee as per Guidelines</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">(i) Member 1</label><br />
                                            <input type="text" name="grievance_member1_name" placeholder="Enter Name"
                                                   class="form-control" id="grievance_member1_name" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="grievance_member1_phone" placeholder="Enter Phone No"
                                                   class="form-control" id="grievance_member1_phone" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="grievance_member1_email" placeholder="Enter Email"
                                                   class="form-control" id="grievance_member1_email" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">(ii) Member 2</label>
                                            <input type="text" name="grievance_member2_name" placeholder="Enter Name"
                                                   class="form-control" id="grievance_member2_name" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="grievance_member2phone" placeholder="Enter Phone No"
                                                   class="form-control" id="grievance_member2_phone" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="grievance_member2_email" placeholder="Enter Email"
                                                   class="form-control" id="grievance_member2_email" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">(iii) Member 3</label>
                                            <input type="text" name="grievance_member3_name" placeholder="Enter Name"
                                                   class="form-control" id="grievance_member3_name" autocomplete="off" >
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="grievance_member3_phone" placeholder="Enter Phone No"
                                                   class="form-control" id="grievance_member3_phone" autocomplete="off" >
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="grievance_member3_email" placeholder="Enter Email"
                                                   class="form-control" id="grievance_member3_email" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-next">Next</button>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Step 2 / 3</h3>
                                <p>Destination</p>
                            </div>
                            <div class="form-top-right">
                                <i class="fa fa-inventory"></i>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <div class="form-group">
                                <label class="control-label col-sm-9 pl-0"><strong>8. </strong> Details of Products / Services
                                    offered</label>
                                <span class="text-right col-sm-3">
                                    <label for="offyes" class="radio">
                                        <input type="radio" name="is_services_offered" id="offyes" class="hidden" />
                                        <span class="label"></span>Yes
                                    </label>
                                    <label for="offno" class="radio">
                                        <input type="radio" name="is_services_offered" id="offno" class="hidden" />
                                        <span class="label"></span>No
                                    </label>
                                </span>
                            </div>
                            <div class="form-group">
                                <label>
                                    <p><b>9</b>. Please confirm the following about your direct selling scheme:-</p>
                                </label>
                                <div>
                                    <label class="col-sm-9">
                                        <b>(a) </b> It has no provision that a direct seller will receive remuneration or
                                        incentives for the recruitment / enrollment of new participants and provide that
                                        direct
                                        sellers will receive remuneration derived only from the sale of goods or
                                        services.
                                    </label>
                                    <span class="text-right col-sm-3">
                                        <label for="selling_scheme_a_yes" class="radio">
                                            <input type="radio" name="selling_scheme_a" id="selling_scheme_a_yes" class="hidden" />
                                            <span class="label"></span>Yes
                                        </label>
                                        <label for="selling_scheme_a_no" class="radio">
                                            <input type="radio" name="selling_scheme_a" id="selling_scheme_a_no" class="hidden" />
                                            <span class="label"></span>No
                                        </label>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-9">
                                    <p><b>(b) </b>It does not require a participant to purchase goods or services :</p>
                                    <label class="pl-2"><b>1. </b>For an amount of that exceeds an amount for which such goods or
                                        services can be expected to be sold or resold to consumer.</label>
                                </label>
                                <span class="col-sm-3 text-right">
                                    <label for="selling_scheme_b1_yes" class="radio">
                                        <input type="radio" name="selling_scheme_b1" id="selling_scheme_b1_yes" class="hidden" />
                                        <span class="label"></span>Yes
                                    </label>
                                    <label for="selling_scheme_b1_no" class="radio">
                                        <input type="radio" name="selling_scheme_b1" id="selling_scheme_b1_no" class="hidden" />
                                        <span class="label"></span>No
                                    </label>
                                </span>
                                <label class="col-sm-9">
                                    <label class="pl-2"><b>2. </b>For an amount of that exceeds an amount for which scuh goods or
                                        services can be expected to be sold or resold to consumer.</label>
                                </label>
                                <span class="text-right col-sm-3">
                                    <label for="selling_scheme_b2_yes" class="radio">
                                        <input type="radio" name="selling_scheme_b2" id="selling_scheme_b2_yes" class="hidden" />
                                        <span class="label"></span>Yes
                                    </label>
                                    <label for="selling_scheme_b2_no" class="radio">
                                        <input type="radio" name="selling_scheme_b2" id="selling_scheme_b2_no" class="hidden" />
                                        <span class="label"></span>No
                                    </label>
                                </span>
                                </li>
                                </ul>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-9 pl-">
                                    <p><b>(c) </b>It does not require a participant to pay any entry/registration fee,
                                        cost
                                        of
                                        sales demonstration equipment and materials or other fees relating to
                                        participation.
                                    </p>
                                </label>
                                <span class="text-right col-sm-3">
                                    <label for="selling_scheme_c_yes" class="radio">
                                        <input type="radio" name="selling_scheme_c" id="selling_scheme_c_yes" class="hidden" />
                                        <span class="label"></span>Yes
                                    </label>
                                    <label for="selling_scheme_c_no" class="radio">
                                        <input type="radio" name="selling_scheme_c" id="selling_scheme_c_no" class="hidden" />
                                        <span class="label"></span>No
                                    </label>
                                </span>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-9">
                                    <p>
                                        <b>(d) </b>It provides a participant with a written contract describing the
                                        "material
                                        terms" of participation.
                                    </p>
                                </label>
                                <span class="text-right col-sm-3">
                                    <label for="selling_scheme_d_yes" class="radio">
                                        <input type="radio" name="selling_scheme_d" id="selling_scheme_d_yes" class="hidden" />
                                        <span class="label"></span>Yes
                                    </label>
                                    <label for="selling_scheme_d_no" class="radio">
                                        <input type="radio" name="selling_scheme_d" id="selling_scheme_d_no" class="hidden" />
                                        <span class="label"></span>No
                                    </label>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-9">
                                    <p><b>(e) </b>It allows or provides for a participant a reasonable cooling-off period to participate or cancel participation in the scheme and receive a refund of any
                                        consideration given to participate in the operations.
                                    </p>
                                </label>
                                <span class="text-right col-sm-3">
                                    <label for="selling_scheme_e_yes" class="radio">
                                        <input type="radio" name="selling_scheme_e" id="selling_scheme_e_yes" class="hidden" />
                                        <span class="label"></span>Yes
                                    </label>
                                    <label for="selling_scheme_e_no" class="radio">
                                        <input type="radio" name="selling_scheme_e" id="selling_scheme_e_no" class="hidden" />
                                        <span class="label"></span>No
                                    </label>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-9">
                                    <p><b>(f) </b>It allows or provides for a buy-back re-purchase policy for "currently
                                        marketable" goods or services sold to the participant at the request of the
                                        participant
                                        at reasonable terms.
                                    </p>
                                </label>
                                <span class="text-right col-sm-3">
                                    <label for="selling_scheme_f_yes" class="radio">
                                        <input type="radio" name="selling_scheme_f" id="selling_scheme_f_yes" class="hidden" />
                                        <span class="label"></span>Yes
                                    </label>
                                    <label for="selling_scheme_f_no" class="radio">
                                        <input type="radio" name="selling_scheme_f" id="selling_scheme_f_no" class="hidden" />
                                        <span class="label"></span>No
                                    </label>
                                </span>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-9 pl-0">
                                    <b>10. </b><b>(a)</b>. Whether proper identity document(s) to all the direct seller
                                    are
                                    issued
                                </label>
                                <span class="text-right col-sm-3">
                                    <label for="is_identity_issues_yes" class="radio">
                                        <input type="radio" name="is_identity_issues" id="is_identity_issues_yes" class="hidden" />
                                        <span class="label"></span>Yes
                                    </label>
                                    <label for="is_identity_issues_no" class="radio">
                                        <input type="radio" name="is_identity_issues" id="is_identity_issues_no" class="hidden" />
                                        <span class="label"></span>No
                                    </label>
                                </span>
                                <label class="col-sm-9 pl-4"><b>(b) </b>.Whether you maintain "Register of Direct Sellers"
                                    wherein relevant
                                    details of each enrolled Direct seller is updated and maintained with details
                                    including verifiable proof of address, proof of identity and PAN as per the
                                    Income Tax Act</label>
                                <span class="text-right col-sm-3">
                                    <label for="is_register_maintain_yes" class="radio">
                                        <input type="radio" name="is_register_maintain" id="is_register_maintain_yes" class="hidden" />
                                        <span class="label"></span>Yes
                                    </label>
                                    <label for="is_register_maintain_no" class="radio">
                                        <input type="radio" name="is_register_maintain" id="is_register_maintain_no" class="hidden" />
                                        <span class="label"></span>No
                                    </label>
                                </span>
                                <p class="pl-4"><b>(c) </b>.
                                    <textarea name="payment_mech"
                                              placeholder="What is the mechanism for payment of VAT ? Give details"
                                              class="form-control" id="vatmechanism" autocomplete="off"
                                              spellcheck="false"></textarea>
                                </p>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-9 pl-0">
                                    <b>11. </b>
                                    <b>(a)</b>. The website is proper and updated regularly with all relevant
                                    details, contact information,details pertaining to management,products, product
                                    information and complaint redress mechanism for direct sellers and consumers.
                                </label>
                                <span class="text-right col-sm-3">
                                    <label for="is_website_maintained_yes" class="radio">
                                        <input type="radio" name="is_website_maintained" id="is_website_maintained_yes" class="hidden" />
                                        <span class="label"></span>Yes
                                    </label>
                                    <label for="is_website_maintained_no" class="radio">
                                        <input type="radio" name="is_website_maintained" id="is_website_maintained_no" class="hidden" />
                                        <span class="label"></span>No
                                    </label>
                                </span>
                                <label class="col-sm-9"><b>(b)</b>. There are arrangements for registering consumer
                                    complaints online or
                                    otherwise and grievances are resolved within 45 days of date of making such
                                    complaints.Details to be Provided</label>
                                <span class="text-right col-sm-3">
                                    <label for="is_consumer_complaints_registered_yes" class="radio">
                                        <input type="radio" name="is_consumer_complaints_registered" id="is_consumer_complaints_registered_yes" class="hidden" />
                                        <span class="label"></span>Yes
                                    </label>
                                    <label for="is_consumer_complaints_registered_no" class="radio">
                                        <input type="radio" name="is_consumer_complaints_registered" id="is_consumer_complaints_registered_no" class="hidden" />
                                        <span class="label"></span>No
                                    </label>
                                </span>
                                <div class="form-group">
                                    <b>12.</b>
                                    <textarea name="remarks" placeholder="Notes / Remarks, if any" class="form-control"
                                              id="remarks" autocomplete="off" spellcheck="false"></textarea>
                                </div>
                            </div>
                            <button type="button" class="btn btn-previous">Previous</button>
                            <button type="button" class="btn btn-next">Next</button>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Step 3 / 3</h3>
                                <p>UnderTaking:</p>
                            </div>
                            <div class="form-top-right">
                                <i class="fa fa-twitter"></i>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <div class="form-group">
                                I / We <input type="text" name="name" autocomplete="off"> in the capacity of <input type="text" autocomplete="off" name="capacity"> of the <input type="text" name="company" autocomplete="off"> company / firm authorized signatory as its, declare that we are complaint with the following :
                            </div>
                            <div class="form-group">
                                <p><b>(a).</b>We do not promote a Pyramid Scheme, as defined in Clause1(11) or enroll any person to such scheme or participate in such arrangement in any manner whatsover in the grab of doing Direct Selling business.</p>
                            </div>
                            <div class="form-group">
                                <p><b>(b).</b>We do not participate in Money Circulation Scheme, as defined in Clause1(12) in the garb of Direct Selling of Business Opportunities.</p>
                            </div>
                            <div class="form-group">
                                <p><b>(c).</b>We are complaint with all the remaining aspects mentioned in the guidelines issued vide F, No. 21/18/2014-IT(Vol-2) dated 9th  September, 2016 by the Department of Consumers, Ministry of Consumer Affairs. Food and Public Distribution and shall also provide such details as may be notified from time to time</p>
                            </div>
                            <div class="form-group">
                                <p><b>Place</b> : <input type="text" name="place" autocomplete="off"></p>
                                <p><b>Date</b> : 13-11-2019 10:43:15 AM</p>
                            </div>
                            <div class="form-group">
                                <h4>Sd/-</h4>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label"><b>Name</b> :</label> <input type="text" name="appname" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label"><b>Designation</b> :</label> <input type="text" name="designation" autocomplete="off">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label"><b>Tel no :</b></label> <input type="text" name="apptelno" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label"><b>Email</b> :</label> <input type="text" name="appemail" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p><b>Certificate of Registration/Bye-laws/Memorandum of Association</b> :
                                        <label class="btn btn-default" for="selectFile1">Please select your file</label>
                                        <span id="fileLabel1"></span>
                                        <input type="file" name="file1" class="sr-only" id="selectFile1"></p>
                                    <p><b>List of Board of Directors, with contact details</b> : <label class="btn btn-info" for="selectFile2">Please select your file</label>
                                        <span id="fileLabel2"></span>
                                        <input type="file" name="file2" class="sr-only" id="selectFile2"></p>
                                    <p><b>Brief Details of direct selling scheme and compensation plan</b> : <label class="btn btn-info" for="selectFile3">Please select your file</label>
                                        <span id="fileLabel3"></span>
                                        <input type="file" name="file3" class="sr-only" id="selectFile3"></p>
                                    <p><b>Sample of contact with direct sellers/ distributors</b> : <label class="btn btn-info" for="selectFile4">Please select your file</label>
                                        <span id="fileLabel4"></span>
                                        <input type="file" name="file4" class="sr-only" id="selectFile4"></p>
                                    <p><b>Any other doc</b> : <label class="btn btn-info" for="selectFile5">Please select your file</label>
                                        <span id="fileLabel5"></span>
                                        <input type="file" name="file5" class="sr-only" id="selectFile5"></p>
                                </div>
                            </div>
                            <button type="button" class="btn btn-previous">Previous</button>
                            <button class="btn btn-next" type="submit">{{ trans('global.save') }}</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/form-js/jquery.backstretch.min.js') }}"></script>
<script src="{{ asset('js/form-js/scripts.js')}}"></script>
@parent @endsection