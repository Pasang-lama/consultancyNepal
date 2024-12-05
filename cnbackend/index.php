<?php session_start();
$base_url = "https://www.consultancynepal.com/cnbackend/";
$url = explode("/", $_SERVER["REQUEST_URI"]);
if ($url[1] == "") {
    $title = "Dashboard";
    include "templates/allpages/loginpage/login.php";
} elseif ($url[1] == "dashboard") {
    if (isset($_SESSION["username"])) {
        $title = "Dashboard";
        include "templates/allpages/dashboard/dashboard.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "consultancydashboard") {
    if (isset($_SESSION["username"])) {
        $title = "consultancydashboard";
        include "templates/consultancydashboard/dashboard.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "createadmin") {
    if (isset($_SESSION["username"])) {
        $title = "Create Admin";
        include "templates/allpages/superadmin/createadmin.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "showadmin") {
    if (isset($_SESSION["username"])) {
        $title = "Show Admin";
        include "templates/allpages/superadmin/showadmin.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "addcountry") {
    if (isset($_SESSION["username"])) {
        $title = "Add Country";
        include "templates/allpages/country/addcountry.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} 
elseif ($url[1] == "rankconsultancy") {
    if (isset($_SESSION["username"])) {
        $title = "Rank Consultancy";
        include "templates/allpages/rankitem/rankconsultancy.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} 
elseif ($url[1] == "rankcountry") {
    if (isset($_SESSION["username"])) {
        $title = "Rank Country";
        include "templates/allpages/rankitem/rankcountry.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} 

elseif ($url[1] == "showcountry") {
    if (isset($_SESSION["username"])) {
        $title = "Show Country";
        include "templates/allpages/country/showcountry.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} 
elseif ($url[1] == "showmembers") {
    if (isset($_SESSION["username"])) {
        $title = "Show Members";
        include "templates/allpages/members/showmembers.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
}
elseif ($url[1] == "addmembers") {
    if (isset($_SESSION["username"])) {
        $title = "Add Members";
        include "templates/allpages/members/addmembers.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
}elseif ($url[1] == "mail") {
    if (isset($_SESSION["username"])) {
        $title = "Show Mail";
        include "templates/allpages/mail/mail.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "addconsultancy") {
    if (isset($_SESSION["username"])) {
        $title = "Add Consultancy";
        include "templates/allpages/consultancy/addconsultancy.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "showclasses") {
    if (isset($_SESSION["username"])) {
        $title = "Add Consultancy";
        include "templates/allpages/consultancy/showclasses.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "addclasses") {
    if (isset($_SESSION["username"])) {
        $title = "Add Consultancy";
        include "templates/allpages/consultancy/addclasses.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "showconsultancy") {
    if (isset($_SESSION["username"])) {
        $title = "Show Consultancy";
        include "templates/allpages/consultancy/showconsultancy.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "addcontent") {
    if (isset($_SESSION["username"])) {
        $title = "Add content";
        include "templates/allpages/content/addcontent.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "showcontent") {
    if (isset($_SESSION["username"])) {
        $title = "Show Content";
        include "templates/allpages/content/showcontent.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "addaboutus") {
    if (isset($_SESSION["username"])) {
        $title = "Add Aboutus";
        include "templates/allpages/aboutus/addaboutus.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "showaboutus") {
    if (isset($_SESSION["username"])) {
        $title = "Show Aboutus";
        include "templates/allpages/aboutus/showaboutus.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "addnews") {
    if (isset($_SESSION["username"])) {
        $title = "Add News";
        include "templates/allpages/news/addnews.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "shownews") {
    if (isset($_SESSION["username"])) {
        $title = "Show News";
        include "templates/allpages/news/shownews.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "addfaq") {
    if (isset($_SESSION["username"])) {
        $title = "Add Faq";
        include "templates/allpages/faq/addfaq.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "showfaq") {
    if (isset($_SESSION["username"])) {
        $title = "Show Faq";
        include "templates/allpages/faq/showfaq.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "showcfaq") {
    if (isset($_SESSION["username"])) {
        $title = "Show Faq";
        include "templates/allpages/faq/showcountryfaq.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "addtestimonial") {
    if (isset($_SESSION["username"])) {
        $title = "Add Testimonial";
        include "templates/allpages/testimonial/addtestimonial.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "showtestimonial") {
    if (isset($_SESSION["username"])) {
        $title = "Show Testimonial";
        include "templates/allpages/testimonial/showtestimonial.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "addbanner") {
    if (isset($_SESSION["username"])) {
        $title = "Add Banner";
        include "templates/allpages/banner/addbanner.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "showbanner") {
    if (isset($_SESSION["username"])) {
        $title = "Show Banner";
        include "templates/allpages/banner/showbanner.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} 
elseif ($url[1] == "addhomebanner") {
    if (isset($_SESSION["username"])) {
        $title = "Add Home  Banner";
        include "templates/allpages/homebanner/addhomebanner.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "showhomebanner") {
    if (isset($_SESSION["username"])) {
        $title = "Show Home Banner";
        include "templates/allpages/homebanner/showhomebanner.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} 

elseif ($url[1] == "addpagetype") {
    if (isset($_SESSION["username"])) {
        $title = "Add pagetype";
        include "templates/allpages/pagetype/addpagetype.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "showpagetype") {
    if (isset($_SESSION["username"])) {
        $title = "Show pagetype";
        include "templates/allpages/pagetype/showpagetype.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "addpages") {
    if (isset($_SESSION["username"])) {
        $title = "Add pages";
        include "templates/allpages/pages/addpages.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "showpages") {
    if (isset($_SESSION["username"])) {
        $title = "Show Pages";
        include "templates/allpages/pages/showpages.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "addtestprepration") {
    if (isset($_SESSION["username"])) {
        $title = "Add Testprepration";
        include "templates/allpages/testprepration/addtestprepration.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "showtestprepration") {
    if (isset($_SESSION["username"])) {
        $title = "Show testPrepration";
        include "templates/allpages/testprepration/showtestprepration.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "addevents") {
    if (isset($_SESSION["username"])) {
        $title = "Add Events";
        include "templates/allpages/events/addevents.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "showevents") {
    if (isset($_SESSION["username"])) {
        $title = "Show Events";
        include "templates/allpages/events/showevents.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "addprovince") {
    if (isset($_SESSION["username"])) {
        $title = "Show Events";
        include "templates/allpages/places/addprovince.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "adddistrict") {
    if (isset($_SESSION["username"])) {
        $title = "Show Events";
        include "templates/allpages/places/adddistrict.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "addcity") {
    if (isset($_SESSION["username"])) {
        $title = "Show Events";
        include "templates/allpages/places/addcity.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "showprovince") {
    if (isset($_SESSION["username"])) {
        $title = "Show Events";
        include "templates/allpages/places/showprovince.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "showdistrict") {
    if (isset($_SESSION["username"])) {
        $title = "Show Events";
        include "templates/allpages/places/showdistrict.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "showcity") {
    if (isset($_SESSION["username"])) {
        $title = "Show Events";
        include "templates/allpages/places/showcity.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "prds") {
    if (isset($_SESSION["username"])) {
        $title = "Show Events";
        include "templates/allpages/places/district_province.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
} elseif ($url[1] == "dsct") {
    if (isset($_SESSION["username"])) {
        $title = "Show Events";
        include "templates/allpages/places/city_district.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
}
elseif ($url[1] == "addarea") {
    if (isset($_SESSION["username"])) {
        $title = "Show Events";
        include "templates/allpages/places/addarea.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
}

elseif ($url[1] == "showarea") {
    if (isset($_SESSION["username"])) {
        $title = "Show Events";
        include "templates/allpages/places/showarea.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
}
elseif ($url[1] == "adduniversities") {
    if (isset($_SESSION["username"])) {
        $title = "Add University";
        include "templates/allpages/universities/universities.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
}
elseif ($url[1] == "showuniversities") {
    if (isset($_SESSION["username"])) {
        $title = "Show University";
        include "templates/allpages/universities/showuniversities.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
}
elseif ($url[1] == "showuniversitieslocation") {
    if (isset($_SESSION["username"])) {
        $title = "Add University Location";
        include "templates/allpages/universities/show_university_location.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
}
 
 
elseif ($url[1] == "adduniversitylocation") {
    if (isset($_SESSION["username"])) {
        $title = "Add University Location";
        include "templates/allpages/universities/add_university_location.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
}

elseif ($url[1] == "addcourse") {
    if (isset($_SESSION["username"])) {
        $title = "Add Course";
        include "templates/allpages/course/addcourse.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
}
elseif ($url[1] == "showcourse") {
    if (isset($_SESSION["username"])) {
        $title = "Show Course";
        include "templates/allpages/course/showcourse.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }
}
elseif($url[1]=="cnepal_enq_new_enquiry_student_add_only"){
        $title = "Add Enquiry";
        include "templates/allpages/enquiry/addenquiry.php";
}
elseif($url[1]=="cnepal_enq_new_enquiry_student_show_only"){
        $title = "Show Enquiry";
        include "templates/allpages/enquiry/showenquiry.php";
}
elseif($url[1]=="addads"){
        $title = "Add ads";
        include "templates/allpages/ads/add.php";
}
elseif($url[1]=="showads"){
        $title = "show ads";
        include "templates/allpages/ads/show.php";
}
elseif($url[1]=="addsides"){
        $title = "Add sides";
        include "templates/allpages/sides/addsides.php";
}
elseif($url[1]=="showsides"){
        $title = "show sides";
        include "templates/allpages/sides/showsides.php";
}
elseif($url[1]=="cn"){
    if($url[2]=="enquiry"){
        if($url[4]=="newenquiries"){
            if($url[5]=="xyz"){
                if($url[6]=="addenquiry"){
                    include "templates/allpages/enquiry/new.php";
                }
                
            }
        }
        
    }
}
elseif($url[1]=="lgl"){
    session_destroy();
    header("Location:https://www.consultancynepal.com/cnbackend");

}
elseif($url[1]=="showenquiry"){
     if (isset($_SESSION["username"])) {
        $title = "Enquiries";
        include "templates/allpages/enquiry/showadminenquiry.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/loginpage/login.php";
    }

}
 
 
elseif ($url[1] == "setting") {
    if (isset($_SESSION["username"])) {
        $title = "Show Setting";
        include "templates/allpages/setting/setting.php";
    } else {
        $_SESSION["messages"] = "Please login to go further";
        include "templates/allpages/setting/setting.php";
    }
}