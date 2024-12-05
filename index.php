<?php
 
ob_start();
session_start();
 
require_once "database/Database.php";
$db = Database::Instance();
// Get the protocol
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';

// Get the domain
$domain = $_SERVER['HTTP_HOST'];

// Get the path
$path = dirname($_SERVER['SCRIPT_NAME']);

// Build the base URL
$base_url = $protocol . '://' . $domain . $path.'/';
// $base_url='localhost/Consultancy-Nepal';
 
$url = explode('/',preg_replace('/[^A-Za-z0-9\-\/]/', '',$_SERVER['REQUEST_URI']));

 

if (count($url) > 3) {
    if ($url[2] == "news") {
        if ($url[3] != "") {
            $getSlug = $url[3];
           
            $total = $db->CustomQuery("SELECT COUNT(*) as total FROM news WHERE slug='$getSlug'");
            $record=$total[0]->total;
            if($record>0){
                require_once('News-section.php');
            
                }else{
                    include "404.php";
                    die();  
                    
                }
               
        }
    } elseif ($url[3] != "") {
        $getSlug = $url[3];
        $country = $url[2];
        $total = $db->CustomQuery("SELECT COUNT(*) as total  FROM country_contents WHERE slug='$getSlug'");
        $record=$total[0]->total;
        $count_country=$db->CustomQuery("SELECT COUNT(*) as con FROM `countries` WHERE country_slug='$country';");
        
        $countryrecord=$count_country[0]->con;
        
        if($record>0 and $countryrecord>0){
        require_once "country_contents.php";
            
        }else{
            include "404.php";
            die();  
            
        }
        
      
    } 
    include "dynamic_slug.php";
} else {
    if ($url[2] == '') {
        $title = "Top Consultancy in Nepal for Abroad Study in Australia, UK, USA, Canada, Germany";
        $content = "Top Consultancy in Nepal for Australia, UK, USA, Canada, Germany, Finland, India, Sweden, Norway, Netherland, Europe, Japan. Best Consultancy in Kathmandu for Study Abroad";
        include('home.php');
    } elseif ($url[2] == 'language-center') {
        $title = "language-center";
        $content = "language-center";
        include('language-center.php');
    } 
    elseif ($url[2] == 'upcoming-classes') {
        $title = "upcoming-classes";
        $content = "upcoming-classes";
        include('upcoming-classes.php');
    }elseif ($url[2] == 'about') {
        $title = "About Consultancy Nepal website";
        $content = "Consultancy Nepal website is a portal for finding the best consultancy for your study aborad dream.";
        include('about-us.php');
    } elseif ($url[2] == 'contact') {
        $title = "Contact Details, Location, Website, Phone Number of Consultancy Nepal,";
        $content = "Find the contact details, phone number, location map, address of Consultancy Nepal. Fill the contact form to get detail information about consultancies in Kathmandu, Nepal";
        include('contact.php');
    } elseif ($url[2] == 'privacy-policy') {
        $title = "privacy policy of Consultancy Nepal";
        $content = "privacy policy of Consultancy Nepal";
        include('privacypolicy.php');
    }elseif ($url[2] == 'news') {
        $title = "News and information of study abroad at Consultancy Nepal,";
        $content = "Get the latest news and information and updates on consultancies in Kathmandu, Nepal";
        include('news.php');
    } elseif ($url[2] == 'blog') {
        $title = "Blog Consultancy Nepal,";
        $content = "Blog of Consultancy Nepal website";
        include('blog-list.php');
    } elseif ($url[2] == 'events') {
        $title = "Events Consultancy Nepal,";
        $content = "Events of Consultancy Nepal website";
        include('event.php');
    } elseif ($url[2] == 'test-preparation') {
        $title = "Test Preparation || Consultancy Nepal,";
        $content = "Test Preparation of Consultancy Nepal website";
        include('test_preparations.php');
    } elseif ($url[2] == 'faq') {
        $title = "Frequently asked questions related to consultancies and abroad studies";
        $content = "Most commonly and frequently asked questions on study abroad destinations and other details about consultancies in Kathmandu Nepal.";
        include('faq.php');
    } elseif ($url[2] == 'consultancy') {
        $title = "List of all consultancy in Kathmandu Nepal";
        $content = "Get the list of Top consultancies of Nepal. List of Best consultancies in Kathmandu.";
        include('consultancy.php');
    } elseif ($url[2] == 'country') {
        $title = "List of all Consultancies by country";
        $content = "Find the complete list of consultancies in Kathmandu Nepal by country.";
        include('country-list.php');
    } elseif ($url[2] == 'faqs') {
        $title = "All the faqs about the consultancies";
        include('faq.php');
    } 
    
    elseif ($url[2] == 'consultancyregistraion') {
        $title = "Consultancies  Resgistraions";
        include('consultancy_register.php');
    }
     elseif ($url[2] == 'university') {
        $title = "University";
        include('universitylist.php');
    }
    else {
        $db = Database::Instance();
        $pageName="";
        $getSlug = $url[2];
            $data = $db->CustomQuery("SELECT * FROM slugs WHERE slug='$getSlug'");
        foreach($data as $page){
            $pageName=$page->page_name;
        }
        if($pageName==""){
            include("404.php");
            die();
        }
        require_once($pageName . '.php');
    }
}