<?php
$pageTitle = "Search Enquiry";
require_once './includes/header.php';
include_once './includes/navbar.php';
?>
<div class="dropdown">
    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>

    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
        <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
        <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
    </div>
</div>
</div>
<form class="mg-b-20 new-added-form">
    <div class="row gutters-8">
        <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
            <select class="select2" id="enqtype" name="enqtype" required>
                <option value="">Select Enquiry Type*</option>
                <option value="Admission">Admission</option>
                <option value="Publication House">Publication House</option>
                <option value="Vacancy">Vacancy</option>
                <option value="Vendor Payment Enquiry">Vendor Payment Enquiry</option>
                <option value="Others">Others</option>

            </select>
        </div>
        <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
            <input type="text" id="fromdate" name="fromdate" placeholder="From Date" class="form-control air-datepicker" data-position='bottom right' required>
            <i class="far fa-calendar-alt"></i>
        </div>
        <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">
            <input type="text" id="todate" name="todate" placeholder="To Date" class="form-control air-datepicker" data-position='bottom right' required>
            <i class="far fa-calendar-alt"></i>
        </div>
        <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
            <button type="submit" class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
        </div>
    </div>
</form>
<div class="table-responsive">
    <table class="table display data-table text-nowrap">
        <thead>
            <tr>
                <th>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input checkAll">
                        <label class="form-check-label">ID</label>
                    </div>
                </th>
                <th>Date of Enquiry</th>
                <th>Enquirer Name</th>
                <th>Contact Number</th>
                <th>For Class</th>
                <th>Candidate Name</th>
                <th>Last Followed By</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label">#0021</label>
                    </div>
                </td>
                <td>02/05/2001</td>
                <td>Mark Willy</td>
                <td>1239988568</td>
                <td>A</td>
                <td>Mark Willy</td>
                <td>Mark Willy</td>

                <td>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="flaticon-more-button-of-three-dots"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label">#0022</label>
                    </div>
                </td>
                <td>02/05/2001</td>
                <td>Jessia Rose</td>
                <td>1239988568</td>
                <td>A</td>
                <td>Jessia Rose</td>
                <td>Jessia Rose</td>
                <td>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="flaticon-more-button-of-three-dots"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label">#0023</label>
                    </div>
                </td>
                <td>02/05/2001</td>
                <td>Mark Willy</td>
                <td>1239988568</td>
                <td>A</td>
                <td>Mark Willy</td>
                <td>Mark Willy</td>

                <td>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="flaticon-more-button-of-three-dots"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label">#0024</label>
                    </div>
                </td>
                <td>02/05/2001</td>
                <td>Jessia Rose</td>
                <td>1239988568</td>
                <td>A</td>
                <td>Jessia Rose</td>
                <td>Jessia Rose</td>
                <td>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="flaticon-more-button-of-three-dots"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label">#0025</label>
                    </div>
                </td>
                <td>02/05/2001</td>
                <td>Mark Willy</td>
                <td>1239988568</td>
                <td>A</td>
                <td>Mark Willy</td>
                <td>Mark Willy</td>

                <td>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="flaticon-more-button-of-three-dots"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label">#0026</label>
                    </div>
                </td>
                <td>02/05/2001</td>
                <td>Jessia Rose</td>
                <td>1239988568</td>
                <td>A</td>
                <td>Jessia Rose</td>
                <td>Jessia Rose</td>
                <td>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="flaticon-more-button-of-three-dots"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label">#0027</label>
                    </div>
                </td>
                <td>02/05/2001</td>
                <td>Mark Willy</td>
                <td>1239988568</td>
                <td>A</td>
                <td>Mark Willy</td>
                <td>Mark Willy</td>

                <td>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="flaticon-more-button-of-three-dots"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label">#0028</label>
                    </div>
                </td>
                <td>02/05/2001</td>
                <td>Jessia Rose</td>
                <td>1239988568</td>
                <td>A</td>
                <td>Jessia Rose</td>
                <td>Jessia Rose</td>
                <td>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="flaticon-more-button-of-three-dots"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label">#0029</label>
                    </div>
                </td>
                <td>02/05/2001</td>
                <td>Mark Willy</td>
                <td>1239988568</td>
                <td>A</td>
                <td>Mark Willy</td>
                <td>Mark Willy</td>

                <td>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="flaticon-more-button-of-three-dots"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label">#0030</label>
                    </div>
                </td>
                <td>02/05/2001</td>
                <td>Jessia Rose</td>
                <td>1239988568</td>
                <td>A</td>
                <td>Jessia Rose</td>
                <td>Jessia Rose</td>
                <td>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="flaticon-more-button-of-three-dots"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label">#0031</label>
                    </div>
                </td>
                <td>02/05/2001</td>
                <td>Mark Willy</td>
                <td>1239988568</td>
                <td>A</td>
                <td>Mark Willy</td>
                <td>Mark Willy</td>

                <td>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="flaticon-more-button-of-three-dots"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label">#0032</label>
                    </div>
                </td>
                <td>02/05/2001</td>
                <td>Jessia Rose</td>
                <td>1239988568</td>
                <td>A</td>
                <td>Jessia Rose</td>
                <td>Jessia Rose</td>
                <td>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="flaticon-more-button-of-three-dots"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                        </div>
                    </div>
                </td>
            </tr>
            <td>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input">
                    <label class="form-check-label">#0033</label>
                </div>
            </td>
            <td>02/05/2001</td>
            <td>Mark Willy</td>
            <td>1239988568</td>
            <td>A</td>
            <td>Mark Willy</td>
            <td>Mark Willy</td>

            <td>
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="flaticon-more-button-of-three-dots"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                    </div>
                </div>
            </td>
            </tr>
            <tr>
                <td>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label">#0034</label>
                    </div>
                </td>
                <td>02/05/2001</td>
                <td>Jessia Rose</td>
                <td>1239988568</td>
                <td>A</td>
                <td>Jessia Rose</td>
                <td>Jessia Rose</td>
                <td>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="flaticon-more-button-of-three-dots"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label">#0035</label>
                    </div>
                </td>
                <td>02/05/2001</td>
                <td>Mark Willy</td>
                <td>1239988568</td>
                <td>A</td>
                <td>Mark Willy</td>
                <td>Mark Willy</td>

                <td>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="flaticon-more-button-of-three-dots"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label">#0036</label>
                    </div>
                </td>
                <td>02/05/2001</td>
                <td>Jessia Rose</td>
                <td>1239988568</td>
                <td>A</td>
                <td>Jessia Rose</td>
                <td>Jessia Rose</td>
                <td>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="flaticon-more-button-of-three-dots"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label">#0037</label>
                    </div>
                </td>
                <td>02/05/2001</td>
                <td>Mark Willy</td>
                <td>1239988568</td>
                <td>A</td>
                <td>Mark Willy</td>
                <td>Mark Willy</td>

                <td>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="flaticon-more-button-of-three-dots"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label">#0038</label>
                    </div>
                </td>
                <td>02/05/2001</td>
                <td>Jessia Rose</td>
                <td>1239988568</td>
                <td>A</td>
                <td>Jessia Rose</td>
                <td>Jessia Rose</td>
                <td>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="flaticon-more-button-of-three-dots"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label">#0039</label>
                    </div>
                </td>
                <td>02/05/2001</td>
                <td>Mark Willy</td>
                <td>1239988568</td>
                <td>A</td>
                <td>Mark Willy</td>
                <td>Mark Willy</td>

                <td>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="flaticon-more-button-of-three-dots"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label">#0040</label>
                    </div>
                </td>
                <td>02/05/2001</td>
                <td>Jessia Rose</td>
                <td>1239988568</td>
                <td>A</td>
                <td>Jessia Rose</td>
                <td>Jessia Rose</td>
                <td>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="flaticon-more-button-of-three-dots"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label">#0041</label>
                    </div>
                </td>
                <td>02/05/2001</td>
                <td>Mark Willy</td>
                <td>1239988568</td>
                <td>A</td>
                <td>Mark Willy</td>
                <td>Mark Willy</td>

                <td>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="flaticon-more-button-of-three-dots"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label">#0042</label>
                    </div>
                </td>
                <td>02/05/2001</td>
                <td>Jessia Rose</td>
                <td>1239988568</td>
                <td>A</td>
                <td>Jessia Rose</td>
                <td>Jessia Rose</td>
                <td>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="flaticon-more-button-of-three-dots"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                        </div>
                    </div>
                </td>
            </tr>

        </tbody>
    </table>
</div>
<?php require_once './includes/scripts.php'; require_once './includes/closebody.php'; ?>