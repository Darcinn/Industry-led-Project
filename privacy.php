<?php

session_start();

$currentPage = 'experience';
if (isset($_SESSION['user_id'])) {
    include('includes/header_loggedin.php');
} else {
    include('includes/header.php');
}

?>

<div class="container light-text">
    <div class="section text-center">
        <br>
        <h1>Privacy Policy for Webflix</h1>
        <h3>Version 1.0</h3>
        <hr>
        <p>
            At Webflix, accessible from 178.62.65.199, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by Webflix and how we use it.

            If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.
        </p>
    </div>

    <hr>

    <div class="section text-center">
        <h3>General Data Protection Regulation (GDPR)</h3>

        <p>
            We are a Data Controller of your information.

            Webflix legal basis for collecting and using the personal information described in this Privacy Policy depends on the Personal Information we collect and the specific context in which we collect the information:

            Webflix needs to perform a contract with you
            You have given Webflix permission to do so
            Processing your personal information is in Webflix legitimate interests
            Webflix needs to comply with the law
            Webflix will retain your personal information only for as long as is necessary for the purposes set out in this Privacy Policy. We will retain and use your information to the extent necessary to comply with our legal obligations, resolve disputes, and enforce our policies.

            If you are a resident of the European Economic Area (EEA), you have certain data protection rights. If you wish to be informed what Personal Information we hold about you and if you want it to be removed from our systems, please contact us.

            In certain circumstances, you have the following data protection rights:

            The right to access, update or to delete the information we have on you.
            The right of rectification.
            The right to object.
            The right of restriction.
            The right to data portability
            The right to withdraw consent
        </p>
    </div>

    <hr>

    <div class="section text-center">
        <h3>Log Files</h3>
        <p>
            Webflix follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users' movement on the website, and gathering demographic information.

        </p>
    </div>

    <hr>

    <div class="section text-center">
        <h3>Google DoubleClick DART Cookie</h3>
        <p>
            Google is one of a third-party vendor on our site. It also uses cookies, known as DART cookies, to serve ads to our site visitors based upon their visit to www.website.com and other sites on the internet. However, visitors may choose to decline the use of DART cookies by visiting the Google ad and content network Privacy Policy at the following URL – https://policies.google.com/technologies/ads
        </p>
    </div>

    <hr>

    <div class="section text-center">
        <h3>Privacy Policies</h3>
        <p>
            You may consult this list to find the Privacy Policy for each of the advertising partners of Webflix.

            Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on Webflix, which are sent directly to users' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.

            Note that Webflix has no access to or control over these cookies that are used by third-party advertisers.
        </p>
    </div>

    <hr>

    <div class="section text-center">
        <h3>Third Party Privacy Policies</h3>
        <p>
            Webflix's Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options.

            You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers' respective websites.
        </p>
    </div>

    <hr>

    <div class="section text-center">
        <h3>Children's Information</h3>
        <p>
            Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.

            Webflix does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.
        </p>
    </div>

    <hr>

    <div class="section text-center">
        <h3>Online Privacy Policy Only</h3>
        <hr>
        <p>
            Our Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in Webflix. This policy is not applicable to any information collected offline or via channels other than this website.
        </p>
    </div>

    <hr>

    <div class="section text-center">
        <h3>Consent</h3>
        <p>
            By using our website, you hereby consent to our Privacy Policy and agree to its terms.
        </p>
    </div>
</div>

<hr>

<?php

include('includes/footer.php');


?>