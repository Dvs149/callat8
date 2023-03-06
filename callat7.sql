-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 09, 2020 at 05:37 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `callat7`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_list`
--

CREATE TABLE `address_list` (
  `id` int(11) NOT NULL,
  `other_name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `landmark` text DEFAULT NULL,
  `address_type` enum('Home','Work','Other') DEFAULT NULL,
  `address_lat` double DEFAULT NULL,
  `address_long` double DEFAULT NULL,
  `default_address` enum('Y','N') NOT NULL DEFAULT 'N',
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bnr_title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bnr_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bnr_image` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('slider','banner','restaurant','groceries','vegetable') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bnr_status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `bnr_title`, `bnr_description`, `bnr_image`, `type`, `bnr_status`) VALUES
(21, 'We will quickly notify at each delivery stage and assist you.', NULL, '4651b9eb59e31081b478a914cdba2a6d.png', 'slider', 'Y'),
(26, 'We deliver documents and more-precisely on your schedule.', NULL, '0541aaa870409c2c5537e254fbc1e4c3.png', 'slider', 'Y'),
(34, NULL, NULL, '7bbd6ef4d138395ce084b7fd7ffcdb94.jpg', 'restaurant', 'Y'),
(35, NULL, NULL, '4f152e41fbe6ba4f737c2e996639deaa.jpg', 'banner', 'Y'),
(36, NULL, NULL, '7bbcbddfd9797cd5bbd2fe6262d0bf18.jpg', 'groceries', 'Y'),
(38, NULL, NULL, 'ccea21b9ad8895e3e840a1c054fe1e42.jpg', 'vegetable', 'N'),
(39, 'ઘરે રહો સુરક્ષિત રહો,  Callat7 નો ઉપયોગ કરો.', NULL, '6ea8dc7ac599a363a39ea.jpg', 'banner', 'N'),
(40, 'તમારુ કરિયાણું તમારા પસંદગીના સ્ટોરમાંથી.', NULL, '21fd3c2bcc1d136b79729a1c9d82a8.jpg', 'banner', 'Y'),
(41, NULL, NULL, '8e4ba3373a46ea8dc7ac599a36.jpg', 'banner', 'Y'),
(42, NULL, NULL, '8721fd3c2bcc1d136b79729a1.jpg', 'banner', 'Y'),
(43, '', NULL, 'stayathome-callat7.jpg', 'banner', 'Y'),
(44, NULL, NULL, 'fruite-vegetables-callat7.jpeg', 'vegetable', 'Y'),
(45, NULL, NULL, 'grocery-callat7.jpeg', 'banner', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `category_item`
--

CREATE TABLE `category_item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_item`
--

INSERT INTO `category_item` (`id`, `name`) VALUES
(1, 'Food'),
(2, 'Groceries'),
(3, 'Vegetable'),
(4, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `city_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`) VALUES
(1, 'Rajkot');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` int(11) NOT NULL,
  `page_name` varchar(255) DEFAULT NULL,
  `content_of_page` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `page_name`, `content_of_page`) VALUES
(1, 'PRIVACY POLICY', '<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>USER&nbsp;PRIVACY STATEMENT</strong></p>\r\n\r\n<p>Callat7 collects information about you when you use our mobile applications, websites, (collectively, the &ldquo;Services&rdquo;) and through other interactions and communications you have with us.</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Scope and Application</strong></p>\r\n\r\n<p>This Privacy Statement (&ldquo;Statement&quot;) applies to persons anywhere in the world who use our apps/website or Services to request, delivery of goods/parcel services (&ldquo;Users&rdquo;). This Statement does not apply to information we collect from or about couriers who use the Callat7 platform under license (collectively &ldquo;Couriers&rdquo;). If you interact with the Services as both a User and a Courier, the respective privacy statements apply to your different interactions.</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Collection of Information</strong></p>\r\n\r\n<p>Information You Provide to Us</p>\r\n\r\n<p>We collect information you provide directly to us, such as when you create or modify your account, request on-demand services, contact customer support, or otherwise communicate with us. This information may include: name, email, phone number, postal address, profile picture, payment method, items requested (for delivery services), delivery notes, and other information you choose to provide.</p>\r\n\r\n<p>Information We Collect Through Your Use of Our Services</p>\r\n\r\n<p>When you use our Services, we collect information about you in the following general categories: Location Information: When you use the Services for delivery of goods, we collect precise location data about the Delivery of goods from the Callat7 app used by the Courier. If you permit the Callat7 app to access location services through the permission system used by your mobile operating system (&ldquo;platform&rdquo;), we may also collect the precise location of your device when the app is running in the foreground or background. We may also derive your approximate location from your IP address.</p>\r\n\r\n<p>Contacts Information: If you permit the Callat7 app to access the address book on your device through the permission system used by your mobile platform, we may access and store names and contact information from your address book to facilitate social interactions through our Services and for other purposes described in this Statement or at the time of consent or collection.</p>\r\n\r\n<p>Transaction Information: We collect transaction details related to your use of our Services, including the type of service requested, date and time the service was provided, amount charged, distance of delivery of goods, and other related transaction details.</p>\r\n\r\n<p>Usage and Preference Information: We collect information about how you and site visitors interact with our Services, preferences expressed, and settings chosen. In some cases we do this through the use of cookies, pixel tags, and similar technologies that create and maintain unique identifiers.</p>\r\n\r\n<p>Device Information: We may collect information about your mobile device, including, for example, the hardware model, operating system and version, software and file names and various, preferred language, unique device identifier, advertising identifiers, serial number, device motion information, and mobile network information.</p>\r\n\r\n<p>Call and SMS Data: Our Services facilitate communications between Users and Couriers. In connection with facilitating this service, we receive call data, including the date and time of the call or SMS message, the parties&rsquo; phone numbers, and the content of the SMS message.</p>\r\n\r\n<p>Log Information: When you interact with the Services, we collect server logs, which may include information like device IP address, access dates and times, app features or pages viewed, app crashes and other system activity, type of browser, and the third-party site or service you were using before interacting with our Services.</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Important Information About Platform Permissions</strong></p>\r\n\r\n<p>Most mobile platforms (iOS, Android, etc.) have defined certain types of device data that apps cannot access without your consent. And these platforms have different permission systems for obtaining your consent. The iOS platform will alert you the first time the Callat7 app wants permission to access certain types of data and will let you consent (or not consent) to that request. Android devices will notify you of the permissions that the Callat7 app seeks before you first use the app, and your use of the app constitutes your consent. To learn about the platform-level permissions that the app seeks, please visit our new iOS Permissions page and Android Permissions page. Sometimes these permissions require more explanation than the platforms themselves provide, and the permissions we request will change over time, so we&rsquo;ve created these pages to serve as authoritative and up-to-date resources for our users.</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Information We Collect From Other Sources</strong></p>\r\n\r\n<p>We may also receive information from other sources and combine that with information we collect through our Services. For example:</p>\r\n\r\n<p>If you choose to link, create, or log in to your Callat7 account with a payment provider (e.g., Google Wallet) or social media service (e.g., Facebook), or if you engage with a separate app or website that uses our API (or whose API we use), we may receive information about you or your connections from that site or app.</p>\r\n\r\n<p>When you request on demand services, our Couriers may provide us with a User rating after providing services to you.</p>\r\n\r\n<p>If you also interact with our Services in another capacity, for instance as a Courier or user of other apps we provide, we may combine or associate that information with information we have collected from you in your capacity as a User</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Use of Information</strong></p>\r\n\r\n<p>We may use the information we collect about you to:</p>\r\n\r\n<p>Provide, maintain, and improve our Services, including, for example, to facilitate payments, send receipts, provide products and services you request (and send related information), develop new features, provide customer support to Users and Couriers, develop safety features, authenticate users, and send product updates and administrative messages;</p>\r\n\r\n<p>Perform internal operations, including, for example, to prevent fraud and abuse of our Services; to troubleshoot software bugs and operational problems; to conduct data analysis, testing, and research; and to monitor and analyze usage and activity trends;</p>\r\n\r\n<p>Send or facilitate communications (i) between you and a Courier or (ii) between you and a contact of yours whom you wish to deliver the goods, at your direction in connection with your use of certain features, such as expected date and time of delivery of goods, name and details of courier who will be providing delivery services.</p>\r\n\r\n<p>Send you communications we think will be of interest to you, including information about products, services, promotions, news, and events of Callat7 and other companies, where permissible and according to local applicable laws; and to process contest, sweepstake, or other promotion entries and fulfill any related awards;</p>\r\n\r\n<p>Personalize and improve the Services, including to provide or recommend features, content, social connections, referrals, and advertisements.</p>\r\n\r\n<p>We may transfer the information described in this Statement to, and process and store it in India. Where this is the case, we will take appropriate measures to protect your personal information in accordance with this Statement.</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Sharing of Information</strong></p>\r\n\r\n<p>We may share the information we collect about you as described in this Statement or as described at the time of collection or sharing, including as follows:</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Through Our Services</strong></p>\r\n\r\n<p>We may share your information:</p>\r\n\r\n<p>With Couriers to enable them to provide the Services you request. For example, we share your name, average User rating given by Couriers, and pickup and delivery locations of goods with Couriers;</p>\r\n\r\n<p>With the general public if you submit content in a public forum, such as blog comments, social media posts, or other features of our Services that are viewable by the general public;</p>\r\n\r\n<p>With third parties with whom you choose to let us share information, for example other apps or websites that integrate with our API or Services, or those with an API or Service with which we integrate;</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Other Important Sharing</strong></p>\r\n\r\n<p>We may share your information:</p>\r\n\r\n<p>With Callat7 subsidiaries and affiliated entities that provide services or conduct data processing on our behalf, or for data centralization and / or logistics purposes;</p>\r\n\r\n<p>With vendors, consultants, marketing partners, and other service providers who need access to such information to carry out work on our behalf;</p>\r\n\r\n<p>In response to a request for information by a competent authority if we believe disclosure is in accordance with, or is otherwise required by, any applicable law, regulation, or legal process;</p>\r\n\r\n<p>With law enforcement officials, government authorities, or other third parties if we believe your actions are inconsistent with our User agreements, Terms of Service, or policies, or to protect the rights, property, or safety of Callat7 or others;</p>\r\n\r\n<p>In connection with, or during negotiations of, any merger, sale of company assets, consolidation or restructuring, financing, or acquisition of all or a portion of our business by or into another company;</p>\r\n\r\n<p>If we otherwise notify you and you consent to the sharing; and</p>\r\n\r\n<p>In an aggregated and/or anonymized form which cannot reasonably be used to identify you.</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Social Sharing Features</strong></p>\r\n\r\n<p>The Services may integrate with social sharing features and other related tools which let you share actions you take on our Services with other apps, sites, or media, and vice versa. Your use of such features enables the sharing of information with your friends or the public, depending on the settings you establish with the social sharing service. Please refer to the privacy policies of those social sharing services for more information about how they handle the data you provide to or share through them.</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Analytics and Advertising Services Provided by Others</strong></p>\r\n\r\n<p>We may allow others to provide audience measurement and analytics services for us, to serve advertisements on our behalf across the Internet, and to track and report on the performance of those advertisements. These entities may use cookies, web beacons, SDKs, and other technologies to identify your device when you visit our site and use our Services, as well as when you visit other online sites and services. For more information about these technologies and service providers, please refer to our Cookie Statement.</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Your Choices</strong></p>\r\n\r\n<p><strong>Account Information</strong></p>\r\n\r\n<p>You may correct your account information at any time by logging into your online or in-app account. Please note that in some cases we may retain certain information about you as required by law, or for legitimate business purposes to the extent permitted by law. For instance, if you have a standing credit or debt on your account, or if we believe you have committed fraud or violated our Terms, we may seek to resolve the issue before deleting your information.</p>\r\n\r\n<p><strong>Access Rights</strong></p>\r\n\r\n<p>Callat7 will comply with individual&rsquo;s requests regarding access, correction, and/or deletion of the personal data it stores in accordance with applicable law.</p>\r\n\r\n<p><strong>Contact Information</strong></p>\r\n\r\n<p>We may also seek permission for our app&rsquo;s collection and syncing of contact information from your device per the permission system used by your mobile operating system. If you initially permit the collection of this information, iOS users can later disable it by changing the contacts settings on your mobile device. The Android platform does not provide such a setting.</p>\r\n\r\n<p><strong>Promotional Communications</strong></p>\r\n\r\n<p>You may opt out of receiving promotional messages from us by following the instructions in those messages. If you opt out, we may still send you non-promotional communications, such as those about your account, about Services you have requested, or our ongoing business relations.</p>\r\n\r\n<p><strong>Cookies and Advertising</strong></p>\r\n\r\n<p>Please refer to our Cookie Statement for more information about your choices around cookies and related technologies.</p>\r\n\r\n<p><strong>Changes to the Statement</strong></p>\r\n\r\n<p>We may change this Statement from time to time. If we make significant changes in the way we treat your personal information, or to the Statement, we will provide you notice through the Services or by some other means, such as email. Your continued use of the Services after such notice constitutes your consent to the changes. We encourage you to periodically review the Statement for the latest information on our privacy practices.</p>\r\n</div>');
INSERT INTO `cms_pages` (`id`, `page_name`, `content_of_page`) VALUES
(2, 'TERMS AND CONDITIONS', '<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p>Contractual Relationship</p>\r\n\r\n<p>These Terms of Use (&ldquo;Terms&rdquo;) govern the access or use by you, an individual, from within any country in the world of applications, websites, content, products, and services (the &ldquo;Services&rdquo;) made available by Callat7, a private limited company.</p>\r\n\r\n<p>These Terms and Conditions (T&amp;Cs) of the Site and Applications provided by the Company define the conditions under which the Company grants the Users and Couriers a licence to use the Site and Applications to enable the Users to entrust the Couriers with Deliveries of Goods and pay them, all within a determined contractual framework under the conditions set out in these T&amp;Cs.</p>\r\n\r\n<p>The Couriers are independent of the Company. The Company offers a Site and Applications enabling a User to make contact with a Courier to have a Delivery of Goods made under these T&amp;Cs.</p>\r\n\r\n<p>The service offered by the Company is that of putting the User and the Courier in contact only. It is the sole responsibility of the Courier to make the Delivery of Goods. The Company is not party to the contract entered into between the User and the Courier with regard to the Delivery of Goods</p>\r\n\r\n<p>Before making an Order Request, the User should read these T&amp;Cs in full to ensure that he/she understand the terms on which the Company and the Couriers provide the respective services.</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p>These T&amp;Cs comprise the following:</p>\r\n\r\n<p>Part A- The &quot;use of services and liability terms, restrictions and ownership provided by We fast to its users.</p>\r\n\r\n<p>Part B - The &ldquo;Use of Services and Liability Terms&rdquo;, which apply to the Services which are provided by the Courier to a User of the Site and Applications website https://Callat7.com/ (the &ldquo;Site&rdquo;).</p>\r\n\r\n<p>Part C - The &ldquo;Courier Terms&rdquo; which apply between the User and the Courier only for order for the Delivery of Goods.</p>\r\n\r\n<p>Part D - the &ldquo;Site Terms&rdquo; which apply to the general use of the Site, regardless of whether any Services are received.</p>\r\n\r\n<p>Part E &ndash; The &ldquo;General Terms&rdquo; which apply to the use of the Services and these T&amp;Cs.</p>\r\n\r\n<p>Part F - The Special Conditions which apply to the Couriers.</p>\r\n\r\n<p>Payment terms</p>\r\n\r\n<p>Disclaimer, Limitation of liability, Indemnity</p>\r\n\r\n<p>Governing law</p>\r\n\r\n<p>Other provisions</p>\r\n\r\n<p>Schedule I</p>\r\n\r\n<p>Schedule II</p>\r\n\r\n<p>Schedule III</p>\r\n\r\n<p>Acceptance of the T&amp;Cs</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p>The use of the Site and Applications is subject to acceptance of these T&amp;Cs.<br />\r\n&bull;Only the acceptance of these T&amp;Cs enables the Members to access the Services offered by the Site and Applications. These T&amp;Cs must be accepted in their entirety and without amendment. In the event of a breach by a Member of any of the obligations set out herein, the Company reserves the right to suspend the Member&#39;s access to the Services, and the Member shall not be entitled to any reimbursement, credit note or compensation.<br />\r\n&bull;These T&amp;Cs include clauses which relate to the Delivery of Goods, which are expressly accepted by the User through issuing an Order Request.<br />\r\n&bull;No special condition or other general conditions issued by the User and/or the Courier shall prevail over these T&amp;Cs.<br />\r\n<br />\r\nAmendments to the T&amp;Cs<br />\r\n<br />\r\n&bull;The Company reserves the right to amend these T&amp;Cs at any time, notably owing to the evolution of the functionalities offered by the Site and the Applications or the rules of operation of the Services. The amendment shall take effect immediately upon making the amended version of the T&amp;Cs available through the Site, which every Member must have first read and accepted in order to use the Services. If a Member objects to the amendment to the T&amp;Cs, he must refrain from using the Site or Applications and the Services.<br />\r\n&bull;When the amendment occurs after payment by the Member of a sum of money corresponding to a Delivery of Goods, the amendment shall not apply to the transaction in progress. If the amendment entails changes to the procedure for access to and/or use of the Site and/or Applications, the Company shall inform the Member of such change in advance via mobile application push notifications or by email at the address notified by the Member.<br />\r\n<br />\r\nDefinitions<br />\r\n<br />\r\nIn these T&amp;Cs, capitalised terms shall have the meanings set out below:<br />\r\n&ldquo;Applications&rdquo;: means the computer applications accessible from a Device and enabling access to the Services and shall include web-site www.Callat7.com mobile applications Callat7 for Android and iOS.<br />\r\n&ldquo;Assigned Courier&quot;: the Courier automatically chosen to provide the Services to the User.<br />\r\n&quot;Collection Address&rdquo;: means the collection address of the Goods stated on the Order Request.<br />\r\n&ldquo;Company&rdquo; (or &ldquo;our&rdquo;, &ldquo;us&rdquo; or &ldquo;we&rdquo;): Callat7.<br />\r\n&ldquo;Customer services&rdquo; @Callat7.com<br />\r\n&quot;Courier&rdquo;: means the individual, who offers his services via the Applications or Site in order to execute Deliveries of Goods on behalf of the Users.<br />\r\n&quot;Goods&quot;: means the item(s) subject to the Order Request, with the exception of the Excluded Items.<br />\r\n&ldquo;Delivery Address&rdquo;: means the delivery address or multiple delivery addresses for the Goods stated on the Order Request.<br />\r\n&ldquo;Delivery (ies) of Goods&rdquo;: means the courier services provided by the Courier(s) to the User via the Applications.<br />\r\n&quot;Delivery Zone&quot;: means a zone where the Company offer equal price for different addresses, as listed on the &#39;tariffs&#39; page of the Site.<br />\r\n&ldquo;Device&rdquo;: means any mobile or other device (smartphone, PC, tablet, etc.) having an internet connection and able to download, install and use the Applications.<br />\r\n&quot;Excluded Items&quot; &ndash; means the excluded items listed in Schedule 1, for which the Company accepts no liability.<br />\r\n&quot;Force Majeure Event&quot; means any circumstance not within a Party&#39;s reasonable control including, without limitation:<br />\r\n(a) acts of God, flood, drought, earthquake or other natural disaster;<br />\r\n(b) Epidemic or pandemic;<br />\r\n(c) Terrorist attack, civil war, civil commotion or riots, war, threat of or preparation for war, armed conflict, imposition of sanctions, embargo, or breaking off of diplomatic relations;<br />\r\n(d) Nuclear, chemical or biological contamination or sonic boom;<br />\r\n(e) Any law or any action taken by a government or public authority, including without limitation imposing an export or import restriction, quota or prohibition [, or failing to grant a necessary licence or consent];<br />\r\n(f) Collapse of buildings, fire, explosion or accident;<br />\r\n(g) any labour or trade dispute, strikes, industrial action or lockouts (other than in each case by the Party seeking to rely on this clause, or companies in the same group as that Party);<br />\r\n(h) Non-performance by suppliers or subcontractors (other than by companies in the same group as the Party seeking to rely on this clause);and<br />\r\n<br />\r\n(i) Interruption or failure of utility service.<br />\r\n<br />\r\n&quot;Member&rdquo;: means either the Courier or the User.<br />\r\n&quot;Method of Transport&rdquo;: means the method(s) used by the Courier to carry the Goods for the purposes of making the Delivery of Goods, including (i) transport on foot, (ii) transport by bicycle, (iii) transport on moped/motorbike, or (iv) transport by land motor vehicle, hereinafter referred to as &ldquo;Vehicle(s)&rdquo;.<br />\r\n&quot;Offered Price&rdquo;: means a quote, calculated from the tariffs listed on the Site, for the execution of a Delivery of Goods.<br />\r\n&quot;Order Acceptance&quot;: means the User&#39;s confirmation that the User accepts the Offered Price and grants the Company the permission to bill the User on the Courier&#39;s behalf.<br />\r\n&quot;Order Details&quot;: means all details to be provided by a User when requesting a Delivery of Goods via the Site or Applications, including the following: Delivery Addresses, timeslots, nature of Goods, weight of parcels, User and Receivers&rsquo; valid mobile phone numbers.<br />\r\n&quot;Order Request&quot;: means a request by a User for a Couriers&#39; acceptance to provide the Services set out in the Order Details.<br />\r\n&quot;Party (ies)&rdquo;: means any of the parties, being the Courier, the User or the Company<br />\r\n&ldquo;Price&rdquo;: means the remuneration for the Delivery of Goods and Services billed to the User under the conditions set out in Schedule 2.<br />\r\n&quot;Prohibited Item&quot;: means the items listed in Schedule 1.<br />\r\n&quot;Sender&rdquo;: means the individual (including the agent or representative of a corporate entity) whose identity and contact details are entered in the Site or Applications by the User as sender of the Goods, and located at the Collection Address;<br />\r\n&quot;Services&quot;: means all services putting the Users and the Couriers in contact, offered through the Site and Applications.<br />\r\n&quot;Site&quot;: means www.Callat7.com, providing access to the Services.<br />\r\n&quot;Technology&quot; means the Site, Applications and any other method introduced by the Company that allows for the automated placing of orders between a User and a Courier.<br />\r\n&quot;Recipient&quot;: means the person (including the agent or representative of a corporate entity) whose identity and contact details are entered in the Site or Applications by the User as Recipient of the Goods and located at the Delivery Address or, where applicable, within a nearby adjacent area.<br />\r\n&quot;SC&rdquo;: means the special conditions of these T&amp;Cs that apply to the Couriers only.<br />\r\n&quot;T&amp;Cs&quot;: means these terms and conditions and their schedules, including the Privacy Policy.<br />\r\n&quot;User&quot; (or &quot;you&quot; or &quot;your&quot;) means the adult individual, or the corporate entity represented by a duly authorized individual, who is resident in the India and requests a Delivery of Goods and to be put in contact with a Courier through the Site or Applications.<br />\r\n<br />\r\n<br />\r\nPart A- THE GENERAL USE OF SERVICE, RESTRICTIONS, OWNERSHIP AND PAYMENT METHOD PROVIDED BY Callat7 TO ITS SERVICE USER THROUGH USE OF SITE/APPLICATION.<br />\r\nPLEASE READ THESE TERMS CAREFULLY BEFORE ACCESSING OR USING THE SERVICES.<br />\r\nYour access and use of the Services constitutes your agreement to be bound by these Terms, which establishes a contractual relationship between you and Callat7. If you do not agree to these Terms and conditions, you may not access or use the Services. These Terms expressly supersede prior agreements or arrangements with you. Callat7 may immediately terminate these Terms or any Services with respect to you, or generally cease offering or deny access to the Services or any portion thereof, at any time for any reason.<br />\r\nSupplemental terms may apply to certain Services, such as policies for a particular event, activity or promotion, and such supplemental terms will be disclosed to you in connection with the applicable Services. Supplemental terms are in addition to, and shall be deemed a part of, the Terms for the purposes of the applicable Services. Supplemental terms shall prevail over these Terms in the event of a conflict with respect to the applicable Services.<br />\r\nCallat7 may amend the Terms and conditions related to the Services from time to time. Amendments will be effective upon Callat7&rsquo;s posting of such updated Terms at this location or the amended policies or supplemental terms on the applicable Service. Your continued access or use of the Services after such posting constitutes your consent to be bound by the Terms, as amended.<br />\r\nCallat7 may provide to a claims processor or an insurer any necessary information (including your contact information) if there is a complaint, dispute or conflict, involving you and a Third Party Provider and such information or data is necessary to resolve the complaint, dispute or conflict.<br />\r\n<br />\r\nThe Services<br />\r\n<br />\r\nThe Services constitute a technology platform that enables users of Callat7&rsquo;s mobile applications or websites provided as part of the Services (each, an &ldquo;Application&rdquo;) to arrange and schedule delivery of items/products and/or logistics services with independent third party providers of such services, including independent third party courier service providers under agreement with Callat7 or certain of Callat7&rsquo;s affiliates (&ldquo;Third Party Providers&rdquo;). Unless otherwise agreed by Callat7 in a separate written agreement with you, the Services are made available solely for your personal / commercial use. YOU ACKNOWLEDGE THAT Callat7 DOES NOT PROVIDE COURIER SERVICES AND THAT ALL SUCH COURIER SERVICES ARE PROVIDED BY INDEPENDENT THIRD PARTY CONTRACTORS WHO ARE NOT EMPLOYED BY Callat7 OR ANY OF ITS AFFILIATES.<br />\r\n<br />\r\nLicense.<br />\r\n<br />\r\nSubject to your compliance with these Terms, Callat7 grants you a limited, non-exclusive, non-sub licensable, revocable, non-transferable license to:<br />\r\n(i) access and use the Applications on your personal device solely in connection with your use of the Services; and (ii) access and use any content, information and related materials that may be made available through the Services, in each case solely for your personal, non-commercial use. Any rights not expressly granted herein are reserved by Callat7 and Callat7&rsquo;s licensors.<br />\r\n<br />\r\nRestrictions.<br />\r\n<br />\r\nYou may not: (i) remove any copyright, trademark or other proprietary notices from any portion of the Services; (ii) reproduce, modify, prepare derivative works based upon, distribute, license, lease, sell, resell, transfer, publicly display, publicly perform, transmit, stream, broadcast or otherwise exploit the Services except as expressly permitted by Callat7; (iii) decompile, reverse engineer or disassemble the Services except as may be permitted by applicable law; (iv) link to, mirror or frame any portion of the Services; (v) cause or launch any programs or scripts for the purpose of scraping, indexing, surveying, or otherwise data mining any portion of the Services or unduly burdening or hindering the operation and/or functionality of any aspect of the Services; or (vi) attempt to gain unauthorized access to or impair any aspect of the Services or its related systems or networks.<br />\r\n<br />\r\nThird Party Services and Content.<br />\r\n<br />\r\nThe Services may be made available or accessed in connection with third party services and content (including advertising) that Callat7 does not control. You acknowledge that different terms of use and privacy policies may apply to your use of such third party services and content. Callat7 does not endorse such third party services and content and in no event shall Callat7 be responsible or liable for any products or services of such third party providers. Additionally, Apple Inc., Google, Inc., Microsoft Corporation or BlackBerry Limited and/or their applicable international subsidiaries and affiliates will be third-party beneficiaries to this contract if you access the Services using Applications developed for Apple iOS, Android, Microsoft Windows, or Blackberry-powered mobile devices, respectively. These third party beneficiaries are not parties to this contract and are not responsible for the provision or support of the Services in any manner. Your access to the Services using these devices is subject to terms set forth in the applicable third party beneficiary&rsquo;s terms of service.<br />\r\n<br />\r\nOwnership.<br />\r\n<br />\r\nThe Services and all rights therein are and shall remain Callat7&rsquo;s property or the property of Callat7&rsquo;s licensors. Neither these Terms nor your use of the Services convey or grant to you any rights: (i) in or related to the Services except for the limited license granted above; or (ii) to use or reference in any manner Callat7&rsquo;s company names, logos, product and service names, trademarks or services marks or those of Callat7&rsquo;s licensors.<br />\r\nYour Use of the Services<br />\r\n<br />\r\nUser Accounts.<br />\r\n<br />\r\nIn order to use most aspects of the Services, you must register for and maintain an active personal user Services account (&ldquo;Account&rdquo;). You must be at least 18 years of age, or the age of legal majority in your jurisdiction (if different than 18), to obtain an Account. Account registration requires you to submit to Callat7 certain personal information, such as your name, address, mobile phone number and age, as well as at least one valid payment method (either a credit card or accepted payment partner). You agree to maintain accurate, complete, and up-to-date information in your Account. Your failure to maintain accurate, complete, and up-to-date Account information, including having an invalid or expired payment method on file, may result in your inability to access and use the Services or Callat7&rsquo;s termination of these Terms with you. You are responsible for all activity that occurs under your Account, and you agree to maintain the security and secrecy of your Account username and password at all times. Unless otherwise permitted by Callat7 in writing, you may only possess one Account.<br />\r\n<br />\r\nUser Requirements and Conduct.<br />\r\n<br />\r\nThe Service is not available for use by persons under the age of 18. You may not authorize third parties to use your Account, and you may not allow persons under the age of 18 to receive COURIER SERVICES from Third Party Providers unless they are accompanied by you. You may not assign or otherwise transfer your Account to any other person or entity. You agree to comply with all applicable laws when using the Services and you may only use the Services for lawful purposes (e.g., no delivery of unlawful or hazardous materials). You will not, in your use of the Services, cause nuisance, annoyance, inconvenience, or property damage, whether to the Third Party Provider or any other party. In certain instances you may be asked to provide proof of identity to access or use the Services, and you agree that you may be denied access to or use of the Services if you refuse to provide proof of identity.<br />\r\n<br />\r\nText Messaging.<br />\r\n<br />\r\nBy creating an Account, you agree that the Services may send you informational text (SMS) messages as part of the normal business operation of your use of the Services. You acknowledge that opting out of receiving text (SMS) messages may impact your use of the Services.<br />\r\n<br />\r\nUser Provided Content.<br />\r\n<br />\r\nCallat7 may, in Callat7&rsquo;s sole discretion, permit you from time to time to submit, upload, publish or otherwise make available to Callat7 through the Services textual, audio, and/or visual content and information, including commentary and feedback related to the Services, initiation of support requests, and submission of entries for competitions and promotions (&ldquo;User Content&rdquo;). Any User Content provided by you remains your property. However, by providing User Content to Callat7, you grant Callat7 a worldwide, perpetual, irrevocable, transferrable, royalty-free license, with the right to sublicense, to use, copy, modify, create derivative works of, distribute, publicly display, publicly perform, and otherwise exploit in any manner such User Content in all formats and distribution channels now known or hereafter devised (including in connection with the Services and Callat7&rsquo;s business and on third-party sites and services), without further notice to or consent from you, and without the requirement of payment to you or any other person or entity.<br />\r\nYou represent and warrant that: (i) you either are the sole and exclusive owner of all User Content or you have all rights, licenses, consents and releases necessary to grant Callat7 the license to the User Content as set forth above; and (ii) neither the User Content nor your submission, uploading, publishing or otherwise making available of such User Content nor Callat7&rsquo;s use of the User Content as permitted herein will infringe, misappropriate or violate a third party&rsquo;s intellectual property or proprietary rights, or rights of publicity or privacy, or result in the violation of any applicable law or regulation.<br />\r\nYou agree to not provide User Content that is defamatory, libellous, hateful, violent, obscene, pornographic, unlawful, or otherwise offensive, as determined by Callat7 in its sole discretion, whether or not such material may be protected by law. Callat7 may, but shall not be obligated to, review, monitor, or remove User Content, at Callat7&rsquo;s sole discretion and at any time and for any reason, without notice to you.<br />\r\nNetwork Access and Devices.<br />\r\nYou are responsible for obtaining the data network access necessary to use the Services. Your mobile network&rsquo;s data and messaging rates and fees may apply if you access or use the Services from a wireless-enabled device and you shall be responsible for such rates and fees. You are responsible for acquiring and updating compatible hardware or devices necessary to access and use the Services and Applications and any updates thereto. Callat7 does not guarantee that the Services, or any portion thereof, will function on any particular hardware or devices. In addition, the Services may be subject to malfunctions and delays inherent in the use of the Internet and electronic communications.<br />\r\nPART B - USE OF SERVICES AND LIABILITY TERMS BETWEEN COURIER SERVICE PROVIDER AND USER OF WEBSITE AND APPLICATION.<br />\r\nRegistration Process<br />\r\nFormation of contract<br />\r\n&bull;The User acknowledges and agrees that in, the cooling-off period AS PER CONSUMER PROTECTION ACT 1986 does not apply for contracts for the transport of goods, and therefore to the Deliveries of Goods.<br />\r\n&bull;An electronic contract of an undefined duration, relating to the license to use the Site and Applications, is entered into between the Member and the Company upon acceptance of these T&amp;Cs by the Member.<br />\r\n&bull;The Company, acting as agent, puts Users in contact with the Courier, acting as Principle, by giving them access to the Company&rsquo;s Site and Applications in order to undertake a Delivery of Goods under the Courier Terms in Part B of these T&amp;C.<br />\r\n&bull;For the avoidance of doubt, the Company is not a Courier and is acting only as an intermediary between you and the Courier. The Delivery of Goods is subject to an electronic contract between the User and the Courier, which is formed via the Site and Applications, under these T&amp;Cs.<br />\r\n&bull;The Order Request comprising a Collection Address, a Sender, a Recipient and a Delivery Address, is issued by the User, via the Site or Applications, and constitutes an offer for services of Delivery of Goods at the Price communicated in the Offered Price.<br />\r\n&bull;The User irrevocably acknowledges and accepts that the above creates a sufficiently precise, firm, unequivocal and unreserved offer which is irrevocable, save under the conditions and within the timeframes indicated in part B, clause 8.1, and is binding on the User upon acceptance by a Courier of an Order Request.<br />\r\n&bull;The Site and Applications allows for the automated placing of orders between a User and a Courier without any human intervention by the Company. We do not &#39;check&#39; the User&#39;s delivery Request before the Courier is assigned. It is therefore essential that the pickup and delivery address is correctly entered and declared in order for the correct Services and pricing to be displayed. The Offered Price will be based on the information you provide when placing the User&#39;s Order Request.<br />\r\n&bull;The Company is not obliged to assign any Courier when you make a delivery Request and the Company reserves the right to refuse and cancel any Order Request.<br />\r\n&bull;A contract for the Services will only be formed upon your delivery request Acceptance and acceptance by a Courier of the delivery Request.<br />\r\n&bull;When a delivery request Acceptance has been made, the Company, acting as agent for the Courier, acting as Principle, will collect, via its banking service provider, the sums due for the Deliveries of Goods undertaken by the Courier for the User.<br />\r\nUse of the Services<br />\r\n&bull;Only Members who accept these terms are in a position to form legally binding contracts under Indian law and may use the Services provided by the Company. Use of the Services is not open to persons aged under 18 or to any persons has previously been suspended or terminated from using the Services. If a Member is using the Services as a business entity, the Member must represent that it has the authority to bind the entity to these T&amp;Cs.<br />\r\n&bull;The Member acknowledges and agrees that the Services are only accessible online via the Site and the Applications.<br />\r\n&bull;The Company reserves the right to reject or cancel a User&#39;s Order Request at any time and for any reason or for no reason.<br />\r\n&bull;The Company reserves the right to notify other Users of any actions that it, in the Company&#39;s sole discretion deem serious, and which have led to the cancellation of a User&#39;s Order Request.<br />\r\n&bull;If a User is so prevented from using the Services, the User may appeal for reinstatement. The appeal must include a written statement as to why the User should be reinstated along with the User&#39;s contact information. The appeal may be reviewed at the Company&#39;s discretion and any determination as to a User&#39;s reinstatement will be at the Company&#39;s sole discretion. A User&#39;s submission of an appeal does not, in any manner, guarantee that you will be reinstated or that the appeal will necessarily be reviewed. The Company will contact the User as to its decision to reinstate you. The Company is not obligated to give you any reasoning as to its decision. All decisions are final.<br />\r\n<br />\r\nLiability<br />\r\n<br />\r\nNo exclusion<br />\r\nNothing in these T&amp;Cs limits or excludes the Company&#39;s liability to a Member for:<br />\r\n&bull;death or personal injury caused by its negligence;<br />\r\n&bull;fraud or fraudulent misrepresentation; or<br />\r\n&bull;Any other liability which cannot be limited or excluded at law.<br />\r\nLimitation of liability<br />\r\nSubject to this Part A, clause 4.1, the Company&#39;s total liability to any Member, whether in contract, tort (including negligence), for breach of statutory duty, or otherwise, arising under or in connection with the T&amp;Cs shall be limited to Rs 1000<br />\r\nThe Company shall not be liable to any Member, whether in contract, tort (including negligence), for breach of statutory duty, or otherwise, arising under or in connection with these T&amp;Cs for:<br />\r\n&bull; loss of profits;<br />\r\n&bull; loss of sales or business;<br />\r\n&bull; loss of agreements or contracts;<br />\r\n&bull; loss of anticipated savings;<br />\r\n&bull; loss of or damage to goodwill;<br />\r\n&bull; loss of use or corruption of software, data or information;<br />\r\n&bull; any indirect or consequential loss;<br />\r\n&bull; losses arising as a result of any information provided by Members, including in relation to the dissemination of such information on the Site and/or Applications;<br />\r\n&bull; losses arising in connection with any use of the Technology and/or the Services by a Member which is in breach of these T&amp;Cs;<br />\r\n&bull; losses arising in connection with: (i) the use or unavailability of the Services, the Site and/or the Applications; and (ii) access to the Services, the Site and/or the Applications by an unauthorised user;<br />\r\n&bull; losses arising in connection with any malfunction of any nature relating to the Member&#39;s Device and his connection to the internet upon accessing the Site, Applications and/or the Services;<br />\r\n&bull; losses arising in connection with mechanical, electronic or electrical derangement of the Goods unless caused by external means; or caused by: latent or inherent defect; defective or inadequate packing, insulation or labelling; shortage in weight, evaporation or ordinary leakage; deliberate abandonment of the Goods or other property: vermin, wear, tear or gradual depreciation; or inherent vice.<br />\r\nAdditional provisions in relation to the Delivery of Goods<br />\r\n&bull; In addition to the provisions of Part B 4.1 and 4.2 of these T&amp;Cs, the following provisions apply in relation to the Delivery of Goods:<br />\r\n&bull;The User acknowledges and agrees that the quality of the services of Delivery of Goods requested via the Site falls wholly under the responsibility of the particular Courier who accepted and/or effected the Delivery of Goods in question.<br />\r\n&bull;The Company shall not be liable for the Delivery of Goods under Part B of these T&amp;Cs including, without limitation, in relation to Goods excluded pursuant to Schedule 1 of these T&amp;Cs.<br />\r\n&bull;The Company shall not be liable for any losses howsoever arising, in relation to any Deliveries of Goods by the Couriers or with regard to the acts, actions, behaviour, attitudes and/or negligence of the Courier.<br />\r\n&bull;On the request of a Member, the Company shall use its best endeavours to seek to resolve any dispute over a Delivery of Goods executed by a Courier under Part C of these T&amp;Cs.<br />\r\nAdditional provisions applicable to the acts of the Members and the contractual relations between the User and the Courier:<br />\r\n&bull;In addition to the provisions of Part B 4.1 and 4.2 of these T&amp;Cs, the following provisions apply in relation to acts of the Members and the contractual relations between the User and the Courier.<br />\r\n&bull;The Member is solely responsible for breaches and/or violations of the legislation applicable to him and to these T&amp;Cs with regard to both the Company and the other Member with whom he is in contractual relations, and for damages that may arise owing to these violations and/or breaches.<br />\r\n&bull;The Member shall be liable for, and shall compensate, the Company and/or any other Member and/or a third party in respect of any claims, complaints, remedies and petitions, of any nature, resulting from such a violation or breach, relating to: i) the use of the Technology by the Member; ii) the relationship between the Courier and the User; iii) the operation of the Method of Transport with regards to the Courier; and iv) the Delivery of Goods with regard to the Courier.<br />\r\n&bull;The Member shall compensate the Company and/or third parties for any direct and indirect damages resulting from such violations and/or breaches.<br />\r\nIndemnity<br />\r\nThe Member shall indemnify, defend and/or settle and hold harmless the Company against any loss or damage (including legal costs) which the Company may sustain or incur, in relation to any third party claim, to the extent such claim is based upon any breach by the Member of the provisions of these T&amp;Cs.<br />\r\nCourier&#39;s Liability<br />\r\n&bull;The Courier may become liable for material damage and/or consequential loss, such as loss, theft, material damage, or destruction of the Goods during the Delivery of Goods, except where the foregoing are due to factors such as, without limitation, fault of the Sender or the Recipient, a Force Majeure Event, a defect inherent to the Goods or insufficient packaging.<br />\r\n&bull;The Courier&#39;s total liability for material damage and/or consequential loss, such as loss, theft, material damage, average or destruction of the Goods shall be lesser of: i) the original value of the Goods; ii) the amount of their repair or reconstitution, In both cases up to the limit of Rs 10,000. The User and/or Recipient must provide receipts to support any claim.<br />\r\n&bull;The Courier shall not be liable for any indirect loss resulting from the Delivery of Goods or the failure of the Delivery of Goods.<br />\r\nIndemnity<br />\r\nWhere Goods include sensitive data and documents the User shall indemnify the Courier against all actions, claims, proceedings and judgments together with costs incurred relating to loss, damage or disclosure of such data or documents.<br />\r\nEnhanced Protection<br />\r\nThe Company may, from time to time, offer Users the ability to purchase Enhanced Protection for losses suffered for Delivery of Goods.<br />\r\n<br />\r\nPART C - COURIER TERMS<br />\r\n<br />\r\nThese Part C Courier Terms apply only to the User and the Courier in relation to the Delivery of Goods. The Company, acting as agent, puts Users in contact with the Courier, acting as Principle, by giving them access to the Company&rsquo;s Technology in order to undertake a Delivery of Goods. All Delivery of Goods by the Courier shall be subject to these Courier Terms.<br />\r\nProcesses relative to the Deliveries of Goods<br />\r\nRequest for Delivery of Goods by the User<br />\r\n&bull;The User shall enter the Collection Address, the Sender from whom the Courier must collect the Goods, the Delivery Address and the Recipient to which the Courier must deliver the Goods into the Site or Applications, together with a telephone number, which may be that of the User and/or the Sender and/or the Recipient.<br />\r\n&bull;The User acknowledges and agrees that this is essential information for the Delivery of Goods on the basis of which the Courier is bound.<br />\r\n&bull; The User represents and warrants to the Courier that the User shall:<br />\r\n&bull; Request the Delivery of Goods to a named individual, on the understanding that the Delivery of Goods can only be confirmed by the Recipient&rsquo;s signature;<br />\r\n&bull;Specify the details, obvious or otherwise, of the Goods when they may have repercussions on the progress of the delivery by the Courier, in particular if they may affect the Method of Transport;<br />\r\n&bull;Not request Delivery of Goods to a Recipient who is inaccessible or which would require unreasonable efforts by the Courier, such as Recipients who may be incarcerated or whose address is inaccessible by land and/or not close to a marked road;<br />\r\n&bull;The details entered into the Order Request are correct and that the Goods correctly labelled (delivery of the Goods will be made based on the details contained on the Goods).<br />\r\n&bull; Only use the Service and the Order Request for legal purposes.<br />\r\n&bull;Not use the Service for Excluded Items.<br />\r\n&bull;Subject to the foregoing, an Offered Price shall then be communicated to the User for the Delivery of Goods.<br />\r\n&bull;On acceptance by a Courier of an Order Request, the User will be provided with the telephone number of the Courier.<br />\r\nAcceptance by the Courier of the Order Request<br />\r\nAcceptance by the Courier of an Order Request via the Site irrevocably binds the Courier to undertake the said Delivery of Goods under the conditions of the T&amp;Cs.<br />\r\n<br />\r\nConfirmation of the Order Request:<br />\r\n<br />\r\n&bull;Irrespective of the Method of Transport used, if the Courier accepts the Order Request, he undertakes to the User to affect the Delivery of Goods under the conditions of Part F.<br />\r\n&bull;Acceptance by a Courier of an Order Request shall be notified to the User by a notification SMS message to the telephone number entered on the Site or Applications in the Order Request or through the Applications, and is deemed to constitute irrevocable conclusion of the contract binding the User to the Courier that makes the Delivery of Goods, subject to the provisions of Part C, Article 8 of these T&amp;Cs.<br />\r\n<br />\r\nPackaging of the Goods<br />\r\n<br />\r\n&bull;The User shall ensure that the Goods are packaged to a reasonable standard to protect the contents. The packaging must also be sufficient to protect the Goods&#39; weight and multiple parcels shall not be strapped or attached together. Any Goods that have not been packaged correctly will be treated as Excluded Items.<br />\r\n&bull;The Couriers will assume that Goods have been correctly packaged and will exercise a level of skill and care appropriate to that. Any claim resulting from a parcel that is not packaged to a reasonable standard and in line with the above may be declined. For further details see Part B clause 2 above.<br />\r\n&bull;All Goods must be able to withstand a short drop, the Services should not be used for very fragile items.<br />\r\n&bull;The Courier has the right to refuse a Goods for a reasonable reason such as no packaging, insufficient packaging or the where the Goods do not comply with the information given by the User in the Order Request - for example the Goods contain deficient or ambiguous labelling, contains a Prohibited item or is larger/heavier than stated. In such circumstances the Cancellation Fee shall be payable<br />\r\n&bull;It is the User&#39;s responsibility to ensure the person handing over the Goods gives it to the correct Courier. Callat7 and the Courier accepts no liability for loss, damage or theft of a Goods as a result of the Goods being given to anyone other than the correct Courier.<br />\r\n&bull;On collection of the Goods the Courier shall offer the Sender to provide a signature at the screen of his/her smartphone. The signature will be proof of collection as required for any issues that the User may have with the Goods or processing of the order.<br />\r\n&bull;It is the User&#39;s responsibility to ensure that all the details are correctly completed and displayed on the correct Goods as delivery will be made to the details listed on the Goods. It is not the Courier&#39;s responsibility to check this information, so please ensure this is checked before he leaves.<br />\r\n<br />\r\nCollection of the Goods<br />\r\n<br />\r\n&bull;The Courier may need to contact the User by telephone after acceptance of the Order Request.<br />\r\n&bull;The Courier may also need to contact the Sender and/or the Recipient, if not the User, by telephone at the time of the Delivery of Goods.<br />\r\n&bull;In this respect, the User who has entered the telephone numbers of the Recipient and/or the Sender, so they can be contacted by the Courier within the framework of the Delivery of Goods, represents and warrants that he has obtained their agreement to do so.<br />\r\n&bull;If the Goods are not ready for collection at the proposed collection time set out in the Order Request, if requested by the User, the Courier will wait for collection of the Goods. An additional charge of 3 per minutes (in addition to the Price remaining payable for the Delivery of Goods) shall be charged to the User if the Courier waits for the Goods for more than 15 minutes after the proposed collection time set out in the Order Request.<br />\r\n&bull;If the Courier is unable to contact the User and/or the Sender and/or the Recipient, the Courier may automatically terminate the Delivery of Goods and charge the User the full Price, in accordance with Part C, clause 6.2 of these T&amp;Cs. In the event that the Delivery of Goods is terminated, the Courier will organise a Delivery of Goods to the Collection Address (reverse process) so that the Courier can return the Goods to the Sender or the User. The cost of delivery will be calculated as if the returning point is the additional waypoint and Sender is the current Recipient.<br />\r\n&bull;The collection of the Goods will normally occur on the User&#39;s chosen date and an delivery Request can be made between 1 hour and 14 days ahead of the required delivery date. Collections are possible 24/7/365, but are subject to Courier availability in applying the Order Request to meet the User&#39;s requirements.<br />\r\n&bull;The automated system on the Site and Applications requests collection times as set out in the User&#39;s Order Request. The Courier is under no obligation to collect the Goods within any timeframe communicated as an estimate, or within any other deadline. In the event that the Courier is unable to collect the Goods within the timeframe set out in the Order Request, the Courier will endeavour to notify the User of the revised collection time as soon as possible.<br />\r\n&bull;Where a failure to collect the Goods in accordance with the Order Request arises from the acts, actions, behaviour, attitudes and/or negligence of the Courier, the Courier must be contacted and redelivery shall be made free of charge. In all other circumstances, any such redelivery will be a new Order Request and will be charged the full Price and the aborted collection will be charged 50% of the Price as a cancellation fee.<br />\r\n&bull;The collection of the Goods by the Courier from the Sender is recorded by the signature of the said Sender on the Applications installed on the Courier&rsquo;s Device. Provision of a signature will be proof of the collection of Goods in accordance with the User&#39;s Order Request.<br />\r\n&bull;The User shall ensure the correct parcel is given to the correct Assigned Courier. The Sender can identify the Assigned Courier using the order reference number received at the time of the booking. The Courier accepts no liability for loss, damage or theft of Goods as a result of the Goods being given to anyone other than the Assigned Courier.<br />\r\nExecution of the Delivery of Goods by the Courier<br />\r\n&bull;The Courier is deemed to be in possession of the Goods once the Sender has signed the Applications installed on the Courier&rsquo;s Device.<br />\r\n&bull;The Courier is under no obligation to make any Delivery of Goods within any timeframe communicated as an estimate, or within any other deadline. However, he undertakes to use best efforts to complete the Delivery of Goods within a reasonable timeframe, taking account of the Method of Transport, the Goods, the traffic and weather conditions, etc.<br />\r\nDelivery of the Goods by the Courier to the Recipient<br />\r\n&bull;The Delivery of the Goods by the Courier to the Recipient is recorded by the signature of the said Recipient on the Applications installed on the Courier&rsquo;s Device. Provision of a signature will be proof of the Delivery of Goods in accordance with the User&#39;s delivery Request.<br />\r\n&bull;Delivery of Goods is possible 24/7/365, but are subject to Courier availability in applying the Order Request to meet the User&#39;s requirements.<br />\r\n&bull;If a Courier has been unable deliver the Goods, the Courier will make reasonable attempts to notify the User by email, text and/or phone call to try to ensure the delivery can occur. After making such reasonable attempts, the Courier may cancel the Delivery of Goods in accordance with Part C, clause 6.2. A cancellation fee of 50% of the Price will apply.<br />\r\n&bull;The User can request that the Delivery of Goods and collection may be made to or from a neighbouring address or an unmanned address by calling the Company&#39;s call centre. The Courier shall not be liable for any claims that the Goods were not delivered where the Courier has confirmed in real time that the Goods was delivered. The Courier may take a photograph of the Delivery of Goods at an unmanned address as proof of delivery.<br />\r\n&bull;Couriers can only deliver to a full street address. The Courier cannot deliver to a PO Box or BFPO address. If a full street address has not been provided and the Courier has been unable to make a Delivery of Goods, no refund will be given to the User and an additional charge of 50% of the Price will be payable as a cancellation fee by the User.<br />\r\nCancellation Of Delivery of Goods<br />\r\n<br />\r\nCancellation by the User<br />\r\n<br />\r\n&bull;The User is not obliged to accept any of the Offered Prices and may cancel his delivery Request, without cost, provided that no delivery request Acceptance has been made.<br />\r\n&bull;Once the User indicates a delivery request Acceptance, the User may cancel his delivery Request, provided that the Courier has not collected, or attempted to collect, the Goods from the Sender. A cancellation fee of 50% of the Price may apply.<br />\r\n&bull;Once the Goods have been collected by the Courier, it is then no longer possible for the User to cancel the Delivery of Goods and the full Price is payable by the User.<br />\r\n&bull;In the event that the Delivery of Goods is cancelled by the User after collection of the Goods by the Courier, the Courier will organise a Delivery of Goods to the Collection Address (reverse process) so that the Courier can return the Goods to the Sender or the User. The cost of delivery will be calculated as if the returning point is the additional waypoint and Sender is the current Recipient.<br />\r\n<br />\r\nCancellation by the Courier<br />\r\n<br />\r\n&bull;The Courier may only cancel a Delivery of Goods in the following cases:<br />\r\n&bull;If the Goods differ from the description given in the Delivery Request;<br />\r\n&bull;If the Goods present dimensions greater than those set out in the Delivery Request;<br />\r\n&bull;If the Goods have no packaging or are insufficiently packaged;<br />\r\n&bull;If the Goods are not labelled correctly;<br />\r\n&bull;If the Goods contain a Prohibited Item; or<br />\r\n&bull;If the Courier cannot execute the Delivery of Goods without communicating with the User and/or the Sender and/or the Recipient and is unable to connect with the User and/or the Sender and/or the Recipient on the telephone numbers provided. .<br />\r\n&bull;The cancellation by the Courier of the Delivery of Goods for the aforementioned reasons must be considered as cancellation by the User as defined in Part C, clause 6.1 of these T&amp;C, and the full Price shall be billed to the User.<br />\r\n<br />\r\nDamaged Goods<br />\r\n<br />\r\n&bull;Upon Delivery of Goods, the User shall, unless otherwise agreed in advance, sign (or ensure that the Recipient signs) for the Goods, indicating to the Courier that the Goods are undamaged.<br />\r\n&bull;In the event of loss or damage to the Goods, the Recipient must refuse to sign for the Delivery of Goods and explain the reasons to the Courier. The User shall also notify the Company of any loss or damage to the Goods separately in writing within 1 day of Delivery of Goods.<br />\r\n&bull;In the absence of detailed reservations recorded by the Recipient at the time of the Delivery of Goods, it shall be the User&#39;s responsibility to prove that the damage took place during the Delivery of Goods by the Courier, and to establish that the damage was caused during the Delivery of Goods by the Courier.<br />\r\n&bull;Once the Courier has left following Delivery of Goods, all enquiries relating to loss or damage to the Goods should be directed through the Company as agent for the Courier.<br />\r\n&bull;Any additional information requested to substantiate a claim for loss or damage of Goods must be made available within 21 days of request. If the information requested is not received within this timescale, the Courier reserves the right to close the claim. The User can send an email to submit a damage/loss claim to www.Callat7.com<br />\r\n&bull;To proceed with a claim, the User will need to have proof that the Courier has taken the Goods from the Sender. In addition, in the event of a claim, a copy of the receipt for the Goods will be required to prove the value of the Goods, together with serial numbers and IMEI numbers for electrical items.<br />\r\n&bull;The damaged Goods together with all packaging should be kept until the claim is concluded as photographs or inspection of the Goods may be necessary.<br />\r\n&bull;If a claim is made that the Goods have been damaged, all packaging should be kept for inspection by the Courier. The item must also be available for inspection in the state it was delivered, at the Delivery Address. Further journeys could cause further damage, making it difficult to assess the original damage. The Courier may also ask for photographs of the internal and external packaging as well as the damaged item to process the claim.<br />\r\n&bull;If the User makes a claim relating to damaged Goods, the Courier may also ask for an estimate of repair costs for the Goods supplied by a specialist. If the Goods cannot be repaired, then the Courier would need this in writing from the specialist.<br />\r\n&bull;A claim relating to lost Goods can only be processed once the Courier has concluded its searches for the Goods within a reasonable timescale.<br />\r\n&bull;Any amounts payable in relation to lost or damaged Goods will only be paid to the User. Please ensure the exact name or company name is entered at the time of booking as a Surcharge will be charged to re-issue a settlement cheque.<br />\r\n&bull;Subject to Part B, clause 4.1, the Courier will not be liable (whether in negligence or otherwise) to the User in respect of any loss or damage of Goods unless legal proceedings are commenced against the Courier within 15 days from the date of Delivery of Goods or the date of a claim decision.<br />\r\n<br />\r\nOther causes<br />\r\n<br />\r\n&bull;No suspension nor reimbursement of the Price owed by the User shall be made in any circumstance other than those listed in Part C, Article 7 of these Ts&amp;Cs, including without limitation, the refusal of the Goods by the Recipient, or his refusal to receive them. If the Recipient refuses to accept the Goods for any reason other than those set out in Part C, Article 7, the Courier shall return the Goods through a Delivery of Goods and the User will be billed for such return.<br />\r\n&bull;The User acknowledges and agrees that the Courier is not responsible for any non-conformity of the Goods or delay in Delivery of Goods in relation to the estimated timeframe indicated, and that these do not constitute a valid and admissible reason for refusing to accept the Goods.<br />\r\n<br />\r\nSurcharges<br />\r\n<br />\r\n&bull;Certain surcharges may be payable by the User to the Courier in addition to the Price. When a surcharge is payable, it may be charged directly to the payment method used to make the initial order (and the User hereby authorise the automated payment of such charges).<br />\r\n&bull;Any Surcharges represent the additional administrative costs, which will be suffered by the Courier in connection with the Services and charges which the Company may incur. The Company act on behalf of the Courier as agent for the purpose of collecting any surcharges. This information is made available to you prior to placing the User&#39;s order.<br />\r\n&bull;For illustrative purposes, the following is a non-exhaustive list of when surcharges may be payable.<br />\r\n&bull;If the Goods are not ready for collection at the proposed collection time set out in the Order Request, if requested by the User, the Courier will wait for collection of the Goods. An additional charge of 3 per minute (in addition to the Price remaining payable for the Delivery of Goods) shall be charged to the User if the Courier waits for the Goods for more than 15 minutes after the proposed collection time set out in the Order Request.<br />\r\n&bull;A surcharge of up to 100% of the Price (in addition to the Price remaining payable) may be applied when the Courier tries to deliver the Goods and is unable to deliver in accordance with the Order Request, after the Courier&rsquo;s attempts to contact you have failed or it has been confirmed that the collection cannot be made when scheduled. Where a failure to deliver the Goods arises from the acts, actions, behaviour, attitudes and/or negligence of the Courier, the User not be liable for the surcharge.<br />\r\n&bull;A surcharge of respective value (in addition to the Fee remaining payable) will be applied if the receiver refuses to take delivery of the goods and they need to be sent back to the collection point or if it is not, in the reasonable opinion of the Courier, possible to leave the Goods in a safe place at the point of delivery. The respective value will be calculated as if the returning point is the additional waypoint and initial Sen Schedule 1 &ndash; Excluded and Prohibited Items Excluded Items You are entitled to send the following items via the Courier Service but the Company will have no liability in respect of such Excluded Items or in the following circumstances:<br />\r\n&bull;Items which may suffer loss, damage, deterioration or depreciation caused by variation in temperature (unless caused by an accident to the conveying Vehicle)<br />\r\n&bull;Items which suffer any mechanical, electronic or electrical derangement unless caused by external means.<br />\r\n&bull;Loss or damage caused by: defective or inadequate packing, insulation or labelling; shortage in weight, evaporation or ordinary leakage; deliberate abandonment of the Goods or other property; vermin, wear, tear or gradual depreciation; inherent vice<br />\r\n&bull;[Include Here the point for Legal Drugs in connection with the urgency and couriers availability] &bull;Living &amp; dead creatures<br />\r\n&bull;Bullion<br />\r\n&bull;Cash and cash like instruments including bank notes, specie and unnamed cheques<br />\r\n&bull;Bonds, treasury notes and other securities<br />\r\n&bull;Stamps<br />\r\n&bull;Prepaid phone cards and similar<br />\r\n&bull;Negotiable instruments<br />\r\n&bull;Precious metals (unless part of a piece of jewellery)<br />\r\n&bull;Precious stones (unless part of a piece of jewellery)<br />\r\n&bull;Cigarettes and other tobacco.<br />\r\n&bull;Data stored in writing in any format, whether hard copy or electronically, with contents including but not limited to names, addresses, bank details, signatures and dates of birth is entirely at the Customer&#39;s risk. Prohibited Items You are prohibited from using the Services for delivery of the following Prohibited Items, in respect of which the Company accepts no liability whatsoever. We do not accept liability for any consequence whatsoever resulting directly or indirectly from or in connection with any of the following Prohibited Items, regardless of any other contributory cause or event: Any and all items which are illegal to carry own or transport or which, in the reasonable opinion of the Company, may potentially be hazardous or dangerous to the Courier or the general public, including but not limited to:<br />\r\n&bull;Explosives including fireworks<br />\r\n&bull;Pornographic materials<br />\r\n&bull;Illegal drugs or any other contraband<br />\r\n&bull;Weapons, Arms, Ammunition or associated parts, accessories, materials, ingredients or technology, including deactivated and replica weapons<br />\r\n&bull;Blades of any kind longer than 1.5 inches<br />\r\n&bull;Dangerous power tools such as chain saws<br />\r\n&bull;Flammable materials<br />\r\n&bull;Dangerous chemicals<br />\r\n&bull;Dangerous biological agents<br />\r\n&bull;Any item packaged in a hazardous or dangerous box<br />\r\n<br />\r\nSchedule 2 - Price<br />\r\n<br />\r\n&bull;Billing mandate The Company puts Users in contact with the Courier by giving them access to the Company&rsquo;s Site and/or Applications. The Courier, acting as principal, confers on the Company, acting as agent, with respect for the applicable economic and tax rules, the task of preparing and issuing the Courier&#39;s invoices. The Price due from the User to the Courier for the Delivery of Goods (less the commission owed to the Company) shall be paid directly to the Courier&#39;s Stripe account. Purpose of the billing mandate The Courier expressly authorises and instructs the Company, which hereby accepts, to prepare in his name and on his behalf original invoices (initial and/or corrective) relating to the Deliveries of Goods to the Users, in compliance with all applicable legislation. The Company shall be responsible for sending the said invoices to the Users. Duration of the agreement This billing mandate, which takes effect upon acceptance of the T&amp;Cs, is entered into for an undefined duration. It may be terminated at any time by the Company and the Courier, without particular reason, by registered letter with acknowledgement of receipt. The revocation shall take effect upon receipt of this registered letter or email. Obligations of the Company<br />\r\nThe Company, acting as agent, shall prepare the invoices for Deliveries of Goods in compliance with the information given by the Courier, in the name and on behalf of the principle, the Courier. The Company shall ensure that the original invoices it issues in the name and on behalf of the Courier are in the same form as if they had been issued by the Courier himself, particularly in relation to the mandatory details required by the applicable legislation. The Company shall also ensure that the original invoices it issues bear the wording &ldquo;Invoice prepared by [the Company] in the name and on behalf of [name of Courier]&rdquo;. Obligations of the Courier The Courier retains full liability for his legal and tax obligations in matters of billing for the original invoices issued in his name and on his behalf by the Company pursuant to these T&amp;Cs, particularly in relation to his VAT obligations. The Company shall not be liable for breaches of the Courier&rsquo;s tax obligations, and shall have no joint and several liability for payment of any VAT, penalties or fines owed by the Courier. The Courier retains full liability, where applicable, for his status as beneficiary of the basic VAT allowance. The Courier shall be responsible for all of his tax and VAT obligations. Dispute over invoices issued on behalf of the Courier That Parties agree that the invoices issued within the framework of these T&amp;Cs do not need to be formally authenticated by the Courier. The Courier shall have a period of fifteen days from its date of issue to contest the content of the invoice issued in his name and on his behalf by the Company. In the absence of dispute within this period, the Courier shall be deemed to have accepted the invoice issued in his name and on his behalf. In the event of dispute, the Company shall issue a corrective invoice. The Price due from the User to the Courier for the Delivery of Goods (less the commission owed to the Company and where applicable the cost of insurance) shall be paid directly to the Courier&#39;s Stripe account.<br />\r\n<br />\r\nSchedule 3 - Privacy Policy This Privacy<br />\r\n<br />\r\nPolicy explains how we use your personal information to deliver your on-demand delivery and courier services (&quot;Services&quot;). This Policy (together with our terms and conditions of use and any other documents referred to on it) sets out the basis on which any personal data we collect from you, or that you provide to us, will be processed by us. This policy applies to our website (www.Callat7.com) (&quot;our site&quot;), to our mobile Applications software (&quot;App&quot;) and to any other method introduced by the Company that allows for the automated placing of orders between you and a Courier. Primarily this Policy is relevant to our registered users, who use our Services. However, it is also relevant to customers who receive deliveries from ordered through our website, and to general visitors to our website. Please read the following carefully to understand our views and practices regarding your personal data and how we will treat it. By providing us with your personal information, you agree to it being used and disclosed in the manner set out in this Policy.<br />\r\nInformation we may collect from you We may collect and process the following data about you: &bull;Information you give us. You may give us information about you by filling in forms on our website or by corresponding with us by phone, e-mail or otherwise. This includes information you provide when you register to use our services, place an order with us, opt to receive delivery of an order, and/or when you report a problem with our site, apps, any other method introduced by the Company that allows for the automated placing of orders between a you and a Courier or the Services.<br />\r\n&bull;The information you give us may include your name; address; e-mail address; phone number; financial and credit card information; your delivery history; the history of the trips taken to make your deliveries; incidents or complaints relating to a delivery; and your signature.<br />\r\n&bull;Information we collect about you. With regard to each of your visits to our site we may automatically collect the following information:<br />\r\n&bull;Technical information, including the Internet protocol (IP) address used to connect your computer to the Internet, your login information, browser type and version, time zone setting, browser plug-in types and versions, operating system and platform;<br />\r\n&bull;Information about your visit, including the full Uniform Resource Locators (URL) clickstream to, through and from our site (including date and time); products you viewed or searched for; page response times, download errors, length of visits to certain pages, page interaction information (such as scrolling, clicks, and mouse-overs), and methods used to browse away from the page and any phone number used to call our customer service number.<br />\r\n&bull;Information we receive from other sources. We may receive information about you if you use any of the other websites we operate or the other services we provide including call centre support. [This information may be shared internally and combined with data collected on this site.] We are also working closely with third parties (including, for example, business partners, sub-contractors in technical, payment and delivery services, advertising networks, analytics providers, search information providers, etc) and may receive information about you from them.</p>\r\n</div>');
INSERT INTO `cms_pages` (`id`, `page_name`, `content_of_page`) VALUES
(3, 'HOW IT WORKS', '<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Delivering within hours or even minutes Callat7 reduces all the hassle of going out in the traffic and save time.</strong></p>\r\n\r\n<p><strong>Grocery</strong></p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p>Order anything from our app or website we get you your things either from our mentioned stores or even from your desired stores. We deliver within hours or even minutes. Moreover, if you want them at some preferred time, just mention and we do the needful.<br />\r\n&nbsp;</p>\r\n\r\n<p><strong>Anything</strong></p>\r\n\r\n<p>Simply ask us to deliver anything from one place to another we deliver everything. Either medicine from pharmacy to you, books to school,food to work, forgotten tickets to airport or railway station, documents to bank or anywhere,keys, tools bags, anything anywhere at your time.<br />\r\n&nbsp;</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Driver</strong></p>\r\n\r\n<p>When you have a car and your driver is absent, we come to help you , it can be for single pick-drop or even a full day job.<br />\r\n&nbsp;</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Taxi</strong></p>\r\n\r\n<p>Either two -wheeler for a single person drop or few people pick and drop service we work to serve you.<br />\r\n&nbsp;</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Pick-Drop</strong></p>\r\n\r\n<p>Household personal or kitchen gadgets or even vessels we pick from you, get repaired from your trusted or favorite technician or store person and again drop it back to you once the work is done.<br />\r\n&nbsp;</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Flour mill</strong></p>\r\n\r\n<p>Ask us and we pick from your place and get it done from your known or mentioned flour mill.<br />\r\n&nbsp;</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Temporary workers</strong></p>\r\n\r\n<p>Either small functions at your place or some work to be done,we provide you with unskilled workers who would help you do whatever you want.<br />\r\n&nbsp;</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Elderly/Guardians</strong></p>\r\n\r\n<p>Send medicines, or food, or clothes or anything to your elders, parents, guardians where you can&#39;t reach on time for busy due to multiple works we do your job.<br />\r\n&nbsp;</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Distance/Place/Areas</strong></p>\r\n\r\n<p>We currently offer same day delivery services in Rajkot city from Kisaan Para Chowk to Metoda Industrial Units. Inside areas would be up to 500 meters from the main Kalawad Road.</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n</div>'),
(4, 'ABOUT US', '<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n\r\n\r\n<p><strong>Delivering within hours or even minutes Callat7 reduces all the hassle of going out in the traffic and save time.</strong></p>\r\n\r\n<p><strong>Grocery</strong></p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p>Order anything from our app or website we get you your things either from our mentioned stores or even from your desired stores. We deliver within hours or even minutes. Moreover, if you want them at some preferred time, just mention and we do the needful.<br />\r\n&nbsp;</p>\r\n\r\n<p><strong>Anything</strong></p>\r\n\r\n<p>Simply ask us to deliver anything from one place to another we deliver everything. Either medicine from pharmacy to you, books to school,food to work, forgotten tickets to airport or railway station, documents to bank or anywhere,keys, tools bags, anything anywhere at your time.<br />\r\n&nbsp;</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Driver</strong></p>\r\n\r\n<p>When you have a car and your driver is absent, we come to help you , it can be for single pick-drop or even a full day job.<br />\r\n&nbsp;</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Taxi</strong></p>\r\n\r\n<p>Either two -wheeler for a single person drop or few people pick and drop service we work to serve you.<br />\r\n&nbsp;</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Pick-Drop</strong></p>\r\n\r\n<p>Household personal or kitchen gadgets or even vessels we pick from you, get repaired from your trusted or favorite technician or store person and again drop it back to you once the work is done.<br />\r\n&nbsp;</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Flour mill</strong></p>\r\n\r\n<p>Ask us and we pick from your place and get it done from your known or mentioned flour mill.<br />\r\n&nbsp;</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Temporary workers</strong></p>\r\n\r\n<p>Either small functions at your place or some work to be done,we provide you with unskilled workers who would help you do whatever you want.<br />\r\n&nbsp;</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Elderly/Guardians</strong></p>\r\n\r\n<p>Send medicines, or food, or clothes or anything to your elders, parents, guardians where you can&#39;t reach on time for busy due to multiple works we do your job.<br />\r\n&nbsp;</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Distance/Place/Areas</strong></p>\r\n\r\n<p>We currently offer same day delivery services in Rajkot city from Kisaan Para Chowk to Metoda Industrial Units. Inside areas would be up to 500 meters from the main Kalawad Road.</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n</div>'),
(5, 'CONTACT US', '<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n\r\n<p><strong>Delivering within hours or even minutes Callat7 reduces all the hassle of going out in the traffic and save time.</strong></p>\r\n\r\n<p><strong>Grocery</strong></p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p>Order anything from our app or website we get you your things either from our mentioned stores or even from your desired stores. We deliver within hours or even minutes. Moreover, if you want them at some preferred time, just mention and we do the needful.<br />\r\n&nbsp;</p>\r\n\r\n<p><strong>Anything</strong></p>\r\n\r\n<p>Simply ask us to deliver anything from one place to another we deliver everything. Either medicine from pharmacy to you, books to school,food to work, forgotten tickets to airport or railway station, documents to bank or anywhere,keys, tools bags, anything anywhere at your time.<br />\r\n&nbsp;</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Driver</strong></p>\r\n\r\n<p>When you have a car and your driver is absent, we come to help you , it can be for single pick-drop or even a full day job.<br />\r\n&nbsp;</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Taxi</strong></p>\r\n\r\n<p>Either two -wheeler for a single person drop or few people pick and drop service we work to serve you.<br />\r\n&nbsp;</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Pick-Drop</strong></p>\r\n\r\n<p>Household personal or kitchen gadgets or even vessels we pick from you, get repaired from your trusted or favorite technician or store person and again drop it back to you once the work is done.<br />\r\n&nbsp;</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Flour mill</strong></p>\r\n\r\n<p>Ask us and we pick from your place and get it done from your known or mentioned flour mill.<br />\r\n&nbsp;</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Temporary workers</strong></p>\r\n\r\n<p>Either small functions at your place or some work to be done,we provide you with unskilled workers who would help you do whatever you want.<br />\r\n&nbsp;</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Elderly/Guardians</strong></p>\r\n\r\n<p>Send medicines, or food, or clothes or anything to your elders, parents, guardians where you can&#39;t reach on time for busy due to multiple works we do your job.<br />\r\n&nbsp;</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<p><strong>Distance/Place/Areas</strong></p>\r\n\r\n<p>We currently offer same day delivery services in Rajkot city from Kisaan Para Chowk to Metoda Industrial Units. Inside areas would be up to 500 meters from the main Kalawad Road.</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n</div>');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_on` enum('web','app') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'app',
  `sender_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_email` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_mobile` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_address_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_address_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_address_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_city` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_longitute` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_latitude` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `otp_expire_time` datetime DEFAULT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `status`, `created_on`, `sender_name`, `sender_email`, `sender_mobile`, `remark`, `sender_address_1`, `sender_address_2`, `sender_address_3`, `sender_city`, `sender_longitute`, `sender_latitude`, `password`, `user_token`, `otp`, `otp_expire_time`, `created_date`) VALUES
(12, 'Y', 'app', 'Nirmalbhai', NULL, '2507202000', NULL, 'Kanhai, AbC medical store,  Rajkot', NULL, NULL, NULL, NULL, NULL, '$2y$10$MBKLY84QqJcxb9FihIkIbuCNm2d1gcP8G6IcTNj/HDgSaAcuAD6nC', NULL, NULL, NULL, '0000-00-00 00:00:00'),
(13, 'Y', 'app', 'Hitesh', NULL, '2607202000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$bMJsdKD8dmlf/rBxJDjwOOr.gtfvhvlJ3zMqAcr5u5ORo/f0P2Fna', NULL, NULL, NULL, '0000-00-00 00:00:00'),
(14, 'Y', 'app', 'Agri Begri', NULL, '2607202001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$WhFhCrA2Pa4.YDo/XvwuUuvW2ahyN.c610uTDBL9A0MqeBrlneNE2', '$2y$10$jYcNa2in/Fxd2ZAkLWDN/uZkZeoHFHponIg0/AcI9AawKcBHAVcU2', NULL, NULL, '0000-00-00 00:00:00'),
(15, 'Y', 'app', 'test', NULL, '2607202002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$Hcq9FCBvpKOcf181MZawHOfqbBsYZjDmB1bK09BrfeivaOKO6EiY6', NULL, NULL, NULL, '0000-00-00 00:00:00'),
(16, 'Y', 'app', 'test', NULL, '2607202003', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$cTO3DTZnSVds9sBkDNOo3O/ufAjh9LtoWZwzsyDqSaORbuCuA.VdG', '$2y$10$0JVj/IGIvaKIR.ykOyakie1FIcEbGKvJk6Ff28rbdUVCtqei8BK.G', NULL, NULL, '0000-00-00 00:00:00'),
(17, 'Y', 'app', 'Hitesh', NULL, '9327647270', NULL, 'test', NULL, NULL, NULL, NULL, NULL, '$2y$10$eXOT4NaKwOyOmPhRwK6oRePsR3A0sqQ3azhkwwa0CZrvD4b0m83D.', '$2y$10$geGWooq0vmM9vqP3C8NrEeOLwRx1IKEgUhBOaSQ5Xc2B6yQ36Cwny', 969443, '2020-08-29 10:13:59', '0000-00-00 00:00:00'),
(18, 'Y', 'app', 'Nishi', 'kanhaistyle@gmail.com', '9925071615', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$2RS3WWlmgui/apicZnQsX.VxIY0UnC.ZuqxOus0KDnuuw33jcAOYG', '$2y$10$knvvUz2aN56eSRMc4GH.Vur6ZOm9.YDjRl3Y8svSGKbIQCzQMI.rW', NULL, NULL, '0000-00-00 00:00:00'),
(19, 'Y', 'app', 'cat', NULL, '1234567891', NULL, 'mouse rajkot', NULL, NULL, NULL, NULL, NULL, '$2y$10$9251tvAXgP9LBIizat6vq.UozJmea4fc0jy4DgeJxEqBw6vnFBD12', NULL, NULL, NULL, '0000-00-00 00:00:00'),
(20, 'Y', 'app', 'NIRMAL', 'nirmalkrishnam@gmail.com', '9825790687', NULL, 'kanhai rajkot', NULL, NULL, NULL, NULL, NULL, '$2y$10$X8j3EFUIQGML6ZoxsXYMbuDPNDwBUjg1//COup9O./JYZlayZjZtO', '$2y$10$L4opE8ltpOf2j5TfJ/L6Dek1Kc35M6HWs1Co/MT/iFlKbJzyg8aSm', 958335, '2020-08-25 08:17:38', '0000-00-00 00:00:00'),
(25, 'Y', 'app', 'Hitesh 29/7/20', NULL, '2907202000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$vys5RX6ZULG.94drlBYo5eH5Qg6mDyJWILKdm.6GUo8Sm2wJ8tg1a', NULL, NULL, NULL, '0000-00-00 00:00:00'),
(26, 'Y', 'app', 'Nirmalbhai', NULL, '2907202001', NULL, 'kanhai test test test rajkot', NULL, NULL, NULL, NULL, NULL, '$2y$10$cN6bW1ptTfe1uGvNUIEwqeD3idmVsbpbWkLv3cgN9Ey4Xs5UunEcK', NULL, NULL, NULL, '0000-00-00 00:00:00'),
(37, 'Y', 'app', 'Ved Bharti', NULL, '9313032995', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$IzWapG40d1uojY.omsD2NeRFSAMEJwf4fsgipSTYTApu6GHV.jPRK', '$2y$10$FRBIL8mG1YeZoRAqrfm/sunHtuxNqqprnK8r3aiuWuPzDKm7KY5yW', NULL, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customer_feedback`
--

CREATE TABLE `customer_feedback` (
  `id` int(11) NOT NULL,
  `rate` double(5,1) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `status` enum('Y','N') DEFAULT 'N',
  `user_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `double_google_order_id` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_feedback`
--

INSERT INTO `customer_feedback` (`id`, `rate`, `comments`, `status`, `user_id`, `driver_id`, `double_google_order_id`, `created_date`) VALUES
(1, 1.3, 'ssss', 'Y', 17, 13, NULL, NULL),
(2, 1.3, 'ssss', 'Y', 17, 13, NULL, NULL),
(3, 1.3, 'ssss', 'Y', 17, 13, NULL, NULL),
(4, 1.3, 'ssss', 'Y', 17, 13, NULL, '2020-09-22 13:05:43'),
(5, 1.3, 'ssss', 'Y', 17, 13, NULL, '2020-09-22 13:06:29'),
(6, 1.3, 'ssss', 'Y', 17, 13, NULL, '2020-09-22 13:07:24'),
(7, 1.3, 'ssss', 'Y', 17, 13, 393, '2020-09-22 13:25:25');

-- --------------------------------------------------------

--
-- Table structure for table `customer_remarks`
--

CREATE TABLE `customer_remarks` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `double_google_order`
--

CREATE TABLE `double_google_order` (
  `id` int(11) NOT NULL,
  `promo_code` varchar(255) DEFAULT NULL,
  `order_number` varchar(50) DEFAULT NULL,
  `order_type_name` varchar(255) DEFAULT NULL,
  `sending_item_name` varchar(255) DEFAULT NULL,
  `parcel_value` double DEFAULT NULL,
  `promo_code_value` double DEFAULT NULL,
  `notify_me_by_sms` enum('Yes','No') NOT NULL DEFAULT 'No',
  `notify_recipients_by_sms` enum('Yes','No') NOT NULL DEFAULT 'No',
  `payment_type` enum('cash','card','cheque') DEFAULT 'cash',
  `is_delivery_free` enum('Yes','No') NOT NULL DEFAULT 'No',
  `delivery_fee` double DEFAULT NULL,
  `order_status` enum('Pending','Completed','Canceled','Out for delivery','Delivered','Deleted','Return','Confirm') NOT NULL DEFAULT 'Pending',
  `order_type` varchar(255) DEFAULT NULL,
  `flag` enum('1','0') DEFAULT '1',
  `order_status_reason` text DEFAULT NULL,
  `store_items` text DEFAULT NULL,
  `version_code` double(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_type_id` int(11) DEFAULT NULL,
  `sending_item_id` int(11) DEFAULT NULL,
  `promo_code_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `double_google_order`
--

INSERT INTO `double_google_order` (`id`, `promo_code`, `order_number`, `order_type_name`, `sending_item_name`, `parcel_value`, `promo_code_value`, `notify_me_by_sms`, `notify_recipients_by_sms`, `payment_type`, `is_delivery_free`, `delivery_fee`, `order_status`, `order_type`, `flag`, `order_status_reason`, `store_items`, `version_code`, `created_at`, `created_by`, `updated_at`, `updated_by`, `store_id`, `driver_id`, `user_id`, `order_type_id`, `sending_item_id`, `promo_code_id`) VALUES
(1, '', '10001', 'Up to 1 kg', 'Documents', 1000, NULL, 'No', 'Yes', 'cash', 'No', 75, 'Pending', 'Pick up', '1', NULL, NULL, NULL, '2020-07-27 09:17:09', 1, '2020-07-27 09:17:09', 1, 0, 5, 18, 1, 1, NULL),
(2, '', '10002', 'Up to 1 kg', 'Others', NULL, NULL, 'No', 'Yes', 'cash', 'No', 75, 'Pending', 'Pick up', '1', NULL, NULL, NULL, '2020-07-27 09:21:42', 1, '2020-07-31 18:45:33', 1, 0, 5, 18, 1, 5, NULL),
(3, '', '10003', 'Up to 1 kg', 'Groceries', 12345, NULL, 'No', 'Yes', 'cash', 'No', 75, 'Delivered', 'Pick up', '1', NULL, NULL, NULL, '2020-07-27 09:25:34', 1, '2020-08-18 14:15:03', 1, 0, 5, 18, 1, 2, NULL),
(7, '', '10007', '', 'Others,', NULL, NULL, 'No', 'No', 'cash', 'No', 75, 'Out for delivery', 'Store', '1', NULL, NULL, NULL, '2020-07-27 13:52:21', 1, '2020-07-31 18:25:08', 1, 9, 11, 18, NULL, NULL, NULL),
(8, '', '10008', '', 'Groceries,', NULL, NULL, 'No', 'No', 'cash', 'No', 75, 'Pending', 'Store', '1', NULL, NULL, NULL, '2020-07-27 13:54:17', 1, '2020-07-27 13:54:17', 1, 1, 11, 18, NULL, NULL, NULL),
(9, '', '10009', 'Up to 1 kg', 'Documents', 20, NULL, 'No', 'Yes', 'cash', 'No', 75, 'Pending', 'Pick up', '1', NULL, NULL, NULL, '2020-07-27 14:02:40', 1, '2020-07-27 14:02:40', 1, 0, 11, 19, 1, 1, NULL),
(10, '', '10010', 'Up to 1 kg', 'Documents', 1, NULL, 'No', 'Yes', 'cash', 'No', 75, 'Deleted', 'Pick up', '1', NULL, NULL, NULL, '2020-07-27 14:04:43', 1, '2020-08-14 17:25:40', 1, 0, 11, 20, 1, 1, NULL),
(11, '', '10011', 'Up to 1 kg', 'Documents', 15, NULL, 'No', 'Yes', 'cash', 'No', 75, 'Pending', 'Pick up', '1', NULL, NULL, NULL, '2020-07-27 14:05:08', 1, '2020-07-27 14:05:08', 1, 0, 11, 20, 1, 1, NULL),
(12, '', '10012', 'Up to 1 kg', 'Documents', 151, NULL, 'No', 'Yes', 'cash', 'No', 75, 'Pending', 'Pick up', '1', NULL, NULL, NULL, '2020-07-27 14:05:18', 1, '2020-07-27 14:05:18', 1, 0, NULL, 20, 1, 1, NULL),
(16, '', '10016', '', 'Present,Flowers,', NULL, NULL, 'No', 'No', 'cash', 'No', 75, 'Pending', 'Anything else', '0', NULL, NULL, NULL, '2020-07-27 21:17:14', 1, '2020-07-27 21:17:14', 1, 0, NULL, 2, NULL, NULL, NULL),
(18, '', '10017', '', 'Others,', NULL, NULL, 'No', 'No', 'cash', 'No', 75, 'Pending', 'Store', '1', NULL, NULL, NULL, '2020-07-28 09:05:58', 1, '2020-07-28 09:05:58', 1, 5, NULL, 1, NULL, NULL, NULL),
(19, '', '10019', 'Up to 1 kg', 'Documents', 500, NULL, 'No', 'Yes', 'cash', 'No', 75, 'Pending', 'Pick up', '1', NULL, NULL, NULL, '2020-07-28 09:14:42', 1, '2020-07-28 09:14:42', 1, 0, NULL, 1, 1, 1, NULL),
(20, '', '10020', '', 'Documents,Groceries,Present,Flowers,Others,', NULL, NULL, 'No', 'No', 'cash', 'No', 75, 'Pending', 'Anything else', '1', NULL, NULL, NULL, '2020-07-28 09:27:05', 1, '2020-07-28 09:27:05', 1, 0, NULL, 1, NULL, NULL, NULL),
(21, '', '10021', 'Up to 1 kg', 'Documents', 500, NULL, 'No', 'Yes', 'cash', 'No', 75, 'Pending', 'Pick up', '1', NULL, NULL, NULL, '2020-07-28 09:32:22', 1, '2020-07-28 09:32:22', 1, 0, NULL, 1, 1, 1, NULL),
(22, '', '10022', '', 'Documents,Groceries,Present,', NULL, NULL, 'No', 'No', 'cash', 'No', 75, 'Pending', 'Store', '1', NULL, NULL, NULL, '2020-07-28 09:49:42', 1, '2020-07-28 09:49:42', 1, 19, NULL, 1, NULL, NULL, NULL),
(23, '', '10023', '', 'Documents,Groceries,', NULL, NULL, 'No', 'No', 'cash', 'No', 75, 'Pending', 'Store', '1', NULL, NULL, NULL, '2020-07-28 09:59:00', 1, '2020-07-28 09:59:00', 1, 1, NULL, 22, NULL, NULL, NULL),
(25, '', '10025', '', 'Others,', NULL, NULL, 'No', 'No', 'cash', 'No', 75, 'Pending', 'Anything else', '1', NULL, NULL, NULL, '2020-07-28 23:59:57', 1, '2020-07-28 23:59:57', 1, 0, NULL, 25, NULL, NULL, NULL),
(26, '', '10026', '', 'Groceries,', NULL, NULL, 'No', 'No', 'cash', 'No', 75, 'Pending', 'Store', '1', NULL, NULL, NULL, '2020-07-29 00:01:56', 1, '2020-07-29 00:01:56', 1, 2, NULL, 25, NULL, NULL, NULL),
(27, '', '10027', 'Up to 1 kg', 'Documents', NULL, NULL, 'No', 'Yes', 'cash', 'No', 75, 'Pending', 'Pick up', '1', NULL, NULL, NULL, '2020-07-29 00:08:05', 1, '2020-07-29 00:08:05', 1, 0, NULL, 26, 1, 1, NULL),
(28, '', '10028', 'Up to 1 kg', 'Documents', NULL, NULL, 'No', 'Yes', 'cash', 'No', 75, 'Pending', 'Pick up', '1', NULL, NULL, NULL, '2020-07-29 00:08:06', 1, '2020-07-29 00:08:06', 1, 0, NULL, 26, 1, 1, NULL),
(29, '', '10029', '', 'Groceries,', NULL, NULL, 'No', 'No', 'cash', 'No', 75, 'Pending', 'Anything else', '1', NULL, NULL, NULL, '2020-07-29 00:12:43', 1, '2020-07-29 00:12:43', 1, 0, NULL, 17, NULL, NULL, NULL),
(48, '', '10030', 'Up to 1 kg', 'Documents', 800, NULL, 'No', 'Yes', 'cash', 'No', 75, 'Pending', 'Pick up', '1', NULL, NULL, NULL, '2020-07-29 15:56:50', 1, '2020-07-29 15:56:50', 1, 0, NULL, 27, 1, 1, NULL),
(49, '', '10049', '', 'Documents,', NULL, NULL, 'No', 'No', 'cash', 'No', 75, 'Pending', 'Anything else', '1', NULL, NULL, NULL, '2020-07-29 15:58:42', 1, '2020-07-29 15:58:42', 1, 0, NULL, 28, NULL, NULL, NULL),
(50, '', '10050', 'Up to 1 kg', 'Documents', 809, NULL, 'No', 'Yes', 'cash', 'No', 75, 'Pending', 'Pick up', '1', NULL, NULL, NULL, '2020-07-29 15:58:47', 1, '2020-07-29 15:58:47', 1, 0, NULL, 27, 1, 1, NULL),
(51, '', '10051', '', 'Documents,', NULL, NULL, 'No', 'No', 'cash', 'No', 75, 'Pending', 'Anything else', '1', NULL, NULL, NULL, '2020-07-29 16:02:27', 1, '2020-07-29 16:02:27', 1, 0, NULL, 27, NULL, NULL, NULL),
(52, '', '10052', '', 'Groceries,', NULL, NULL, 'No', 'No', 'cash', 'No', 75, 'Pending', 'Anything else', '1', NULL, NULL, NULL, '2020-07-29 16:04:47', 1, '2020-07-29 16:04:47', 1, 0, NULL, 29, NULL, NULL, NULL),
(53, '', '10053', '', 'Groceries,', NULL, NULL, 'No', 'No', 'cash', 'No', 75, 'Pending', 'Store', '1', NULL, NULL, NULL, '2020-07-29 16:04:59', 1, '2020-07-29 16:04:59', 1, 1, NULL, 27, NULL, NULL, NULL),
(54, '', '10054', '', 'Documents,', NULL, NULL, 'No', 'No', 'cash', 'No', 75, 'Pending', 'Anything else', '1', NULL, NULL, NULL, '2020-07-29 16:06:25', 1, '2020-07-29 16:06:25', 1, 0, NULL, 30, NULL, NULL, NULL),
(55, '', '10055', '', 'Documents,', NULL, NULL, 'No', 'No', 'cash', 'No', 75, 'Pending', 'Anything else', '1', NULL, NULL, NULL, '2020-07-29 16:28:23', 1, '2020-07-29 16:28:23', 1, 0, NULL, 31, NULL, NULL, NULL),
(56, '', '10056', '', 'Documents,', NULL, NULL, 'No', 'No', 'cash', 'No', 75, 'Pending', 'Anything else', '1', NULL, NULL, NULL, '2020-07-29 16:34:50', 1, '2020-07-29 16:34:50', 1, 0, NULL, 32, NULL, NULL, NULL),
(71, '', '10057', 'Up to 1 kg', 'Documents', 800, NULL, 'No', 'Yes', 'cash', 'No', 75, 'Pending', 'Pick up', '1', NULL, NULL, NULL, '2020-07-30 12:03:54', 1, '2020-07-30 12:03:54', 1, 0, NULL, 35, 1, 1, NULL),
(72, '', '10072', '', 'Others,', NULL, NULL, 'No', 'No', 'cash', 'No', 75, 'Pending', 'Store', '1', NULL, NULL, NULL, '2020-07-30 12:05:22', 1, '2020-07-30 12:05:22', 1, 4, NULL, 35, NULL, NULL, NULL),
(73, '', '10073', '', 'Documents,', NULL, NULL, 'No', 'No', 'cash', 'No', 75, 'Pending', 'Store', '1', NULL, NULL, NULL, '2020-07-30 12:06:31', 1, '2020-07-30 12:06:31', 1, 1, NULL, 35, NULL, NULL, NULL),
(74, '', '10074', '', 'Groceries,', NULL, NULL, 'No', 'No', 'cash', 'No', 75, 'Pending', 'Anything else', '1', NULL, NULL, NULL, '2020-07-30 12:08:09', 1, '2020-07-30 12:08:09', 1, 0, NULL, 35, NULL, NULL, NULL),
(75, '', '10075', 'Up to 5 kg', 'Documents', 500, NULL, 'No', 'Yes', 'cash', 'No', 75, 'Pending', 'Pick up', '1', NULL, NULL, NULL, '2020-07-30 14:29:49', 1, '2020-07-30 14:29:49', 1, NULL, NULL, NULL, 2, 1, NULL),
(76, '', '10076', 'Up to 1 kg', 'Documents', 800, NULL, 'No', 'Yes', 'cash', 'No', 75, 'Delivered', 'Pick up', '1', NULL, NULL, NULL, '2020-07-30 14:40:03', 1, '2020-08-18 12:22:30', 1, 0, 5, 35, 1, 1, NULL),
(80, '', '10080', '', 'Groceries,', NULL, NULL, 'No', 'No', 'cash', 'No', 49, 'Pending', 'Store', '1', NULL, NULL, NULL, '2020-07-30 20:06:01', 1, '2020-07-30 20:06:01', 1, 3, NULL, 17, NULL, NULL, NULL),
(81, '', '10081', '', 'Others,', NULL, NULL, 'No', 'No', 'cash', 'No', 49, 'Pending', 'Anything else', '1', NULL, NULL, NULL, '2020-07-30 20:25:38', 1, '2020-07-30 20:25:38', 1, 0, NULL, 17, NULL, NULL, NULL),
(82, '', '10082', '', 'Others,', NULL, NULL, 'No', 'No', 'cash', 'No', 49, 'Pending', 'Anything else', '1', NULL, NULL, NULL, '2020-07-30 20:26:35', 1, '2020-08-01 11:53:09', 1, 0, NULL, 17, NULL, NULL, NULL),
(94, '', '10094', 'Up to 5 kg', 'Documents', 500, NULL, 'No', 'Yes', 'cash', 'No', 75, 'Deleted', 'Pick up', '1', NULL, NULL, NULL, '2020-07-31 16:51:35', 1, '2020-08-01 23:40:28', 1, NULL, NULL, 36, 2, 1, NULL),
(99, '', '10095', '', 'Document,Groceries,Food', NULL, NULL, 'No', 'No', NULL, 'No', NULL, 'Deleted', 'Anything else', '1', NULL, NULL, NULL, '2020-08-01 09:02:00', 1, '2020-08-01 23:31:52', 1, 1, 5, 36, NULL, NULL, NULL),
(179, '', '10179', '', 'Food,', NULL, NULL, 'No', 'No', 'cash', 'No', 49, 'Pending', 'Store', '1', NULL, NULL, NULL, '2020-08-09 10:28:56', 1, '2020-08-10 12:10:24', 1, 5, NULL, 20, NULL, NULL, NULL),
(181, '', '10181', 'Up to 1 kg', 'Documents', 10, NULL, 'No', 'Yes', 'cash', 'No', 49, 'Pending', 'Pick up', '1', NULL, NULL, NULL, '2020-08-09 22:56:38', 1, '2020-08-10 12:10:24', 1, 0, NULL, 17, 1, 1, NULL),
(182, '', '10182', '', 'Food,', NULL, NULL, 'No', 'No', 'cash', 'No', 49, 'Pending', 'Store', '1', NULL, NULL, NULL, '2020-08-09 23:02:22', 1, '2020-08-10 12:10:24', 1, 4, NULL, 17, NULL, NULL, NULL),
(203, '', '10203', '', 'Other,', NULL, NULL, 'No', 'No', 'cash', 'No', 49, 'Deleted', 'Anything else', '1', NULL, NULL, NULL, '2020-08-14 16:47:22', 1, '2020-08-14 17:24:25', 1, 0, 5, 20, NULL, NULL, NULL),
(204, '', '10204', '', 'Food,Groceries,Vegetable,Other,', NULL, NULL, 'No', 'No', 'cash', 'No', 49, 'Completed', 'Anything else', '1', NULL, NULL, NULL, '2020-08-14 16:49:53', 1, '2020-08-18 10:15:14', 1, 0, 13, 20, NULL, NULL, NULL),
(298, '', '10298', 'Up to 1 kg', 'Documents', 1240, NULL, 'No', 'Yes', 'cash', 'No', 49, 'Pending', 'Pick up', '1', NULL, NULL, NULL, '2020-08-24 08:55:39', 1, '2020-08-24 08:55:39', 1, 0, NULL, 20, 1, 1, NULL),
(299, '', '10299', 'Up to 10 kg', 'Groceries', 4999, NULL, 'No', 'Yes', 'cash', 'No', 49, 'Pending', 'Pick up', '1', NULL, NULL, NULL, '2020-08-24 08:58:26', 1, '2020-08-24 08:58:26', 1, 0, NULL, 20, 3, 2, NULL),
(300, '', '10300', 'Up to 1 kg', 'Documents', 1500, NULL, 'No', 'Yes', 'cash', 'No', 49, 'Pending', 'Pick up', '1', NULL, NULL, NULL, '2020-08-24 09:05:42', 1, '2020-08-24 09:05:42', 1, 0, NULL, 20, 1, 1, NULL),
(301, '', '10301', '', 'Food,', NULL, NULL, 'No', 'No', 'cash', 'No', 49, 'Pending', 'Store', '1', NULL, NULL, NULL, '2020-08-24 09:07:13', 1, '2020-08-24 09:07:13', 1, 4, NULL, 20, NULL, NULL, NULL),
(302, '', '10302', '', 'Groceries,', NULL, NULL, 'No', 'No', 'cash', 'No', 49, 'Pending', 'Store', '1', NULL, NULL, NULL, '2020-08-24 09:08:12', 1, '2020-08-24 09:08:12', 1, 1, NULL, 20, NULL, NULL, NULL),
(307, '', '10303', '', 'Vegetable,', NULL, NULL, 'No', 'No', 'cash', 'No', 49, 'Pending', 'Anything else', '1', NULL, NULL, NULL, '2020-08-24 09:11:27', 1, '2020-08-24 09:11:27', 1, 26, NULL, 20, NULL, NULL, NULL),
(314, '', '10314', '', 'Food,', NULL, NULL, 'No', 'No', 'cash', 'No', 49, 'Pending', 'Anything else', '1', NULL, NULL, NULL, '2020-08-24 19:40:22', 1, '2020-08-24 19:40:22', 1, 0, NULL, 17, NULL, NULL, NULL),
(315, '', '10315', '', 'Groceries,', NULL, NULL, 'No', 'No', 'cash', 'No', 49, 'Pending', 'Anything else', '1', NULL, NULL, NULL, '2020-08-24 19:41:54', 1, '2020-08-24 19:41:54', 1, 0, NULL, 17, NULL, NULL, NULL),
(316, '', '10316', '', 'Vegetable,', NULL, NULL, 'No', 'No', 'cash', 'No', 49, 'Pending', 'Anything else', '1', NULL, NULL, NULL, '2020-08-24 19:44:43', 1, '2020-08-24 19:44:43', 1, 0, NULL, 17, NULL, NULL, NULL),
(317, '', '10317', 'Up to 1 kg', 'Others', 1000, NULL, 'Yes', 'Yes', 'cash', 'No', 49, 'Pending', 'Pick up', '1', NULL, NULL, NULL, '2020-08-24 19:50:26', 1, '2020-08-25 10:06:59', 1, 0, NULL, 17, 1, 6, NULL),
(318, '', '10318', 'Up to 1 kg', 'Others', 1000, NULL, 'Yes', 'Yes', 'cash', 'No', 49, 'Pending', 'Pick up', '1', NULL, NULL, NULL, '2020-08-24 19:50:26', 1, '2020-08-25 10:06:59', 1, 0, NULL, 17, 1, 6, NULL),
(319, '', '10319', 'Up to 1 kg', 'Documents', 2500, NULL, 'Yes', 'Yes', 'cash', 'No', 49, 'Pending', 'Pick up', '1', NULL, NULL, NULL, '2020-08-25 07:20:20', 1, '2020-08-27 11:48:09', 1, 0, NULL, 20, 1, 1, NULL),
(341, '', '10341', '', 'Food,', NULL, NULL, 'No', 'No', 'cash', 'No', 49, 'Confirm', 'Anything else', '1', NULL, NULL, NULL, '2020-08-25 23:56:27', 1, '2020-08-27 11:48:09', 1, 0, 14, 17, NULL, NULL, NULL),
(342, '', '10342', '', 'Groceries,', NULL, NULL, 'No', 'No', 'cash', 'No', 49, 'Deleted', 'Anything else', '1', NULL, NULL, NULL, '2020-08-25 23:59:06', 1, '2020-08-27 11:48:09', 1, 0, NULL, 17, NULL, NULL, NULL),
(343, '', '10343', '', 'Vegetable,', NULL, NULL, 'No', 'No', 'cash', 'No', 49, 'Pending', 'Anything else', '1', NULL, NULL, NULL, '2020-08-26 00:01:44', 1, '2020-08-27 11:48:09', 1, 0, NULL, 17, NULL, NULL, NULL),
(363, '', '10363', '', 'Food,', NULL, NULL, 'No', 'No', 'cash', 'No', 49, 'Pending', 'Anything else', '1', NULL, NULL, 1.00, '2020-08-28 12:29:14', 1, '2020-08-28 16:12:38', 1, 0, NULL, 17, NULL, NULL, NULL),
(364, '', '10364', '', 'Groceries,', NULL, NULL, 'No', 'No', 'cash', 'No', 49, 'Confirm', 'Anything else', '1', NULL, NULL, 1.00, '2020-08-28 12:31:00', 1, '2020-08-28 16:12:38', 1, 0, 12, 17, NULL, NULL, NULL),
(365, '', '10365', '', 'Vegetable,', NULL, NULL, 'No', 'No', 'cash', 'No', 49, 'Pending', 'Anything else', '1', NULL, NULL, 1.00, '2020-08-28 12:33:03', 1, '2020-08-28 16:12:38', 1, 0, NULL, 17, NULL, NULL, NULL),
(368, '', '10368', '', 'Food,', NULL, NULL, 'No', 'No', 'cash', 'No', 49, 'Confirm', 'Anything else', '1', NULL, NULL, 1.00, '2020-08-28 12:58:42', 1, '2020-08-28 16:12:38', 1, 0, 12, 17, NULL, NULL, NULL),
(388, '', '10388', '', 'Food,', NULL, NULL, 'No', 'No', 'cash', 'No', 49, 'Confirm', 'Restaurant', '1', NULL, NULL, 1.00, '2020-08-28 21:06:37', 1, '2020-09-18 09:31:52', 1, 0, NULL, 17, NULL, NULL, NULL),
(391, '', '10391', '', 'Food,', NULL, NULL, 'No', 'No', 'cash', 'No', 49, 'Pending', 'Restaurant', '1', NULL, NULL, 1.00, '2020-08-29 09:16:46', 1, '2020-09-18 09:49:25', 1, 4, 13, 17, NULL, NULL, NULL),
(392, '', '10392', 'Up to 1 kg', 'Documents', 650, NULL, 'Yes', 'Yes', 'cash', 'No', 49, 'Pending', 'Pick up', '1', NULL, NULL, 1.00, '2020-08-29 10:28:56', 1, '2020-09-18 09:58:33', 1, 0, 13, 17, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `double_google_order_items`
--

CREATE TABLE `double_google_order_items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_quantity` double(10,2) DEFAULT NULL,
  `double_google_order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `double_google_order_items`
--

INSERT INTO `double_google_order_items` (`id`, `item_name`, `item_quantity`, `double_google_order_id`) VALUES
(1, 'Burger', 2.00, 4),
(2, 'Pizza', 3.00, 4),
(3, 'Burger', 6.00, 13),
(4, 'Pen', 1.00, 15),
(5, 'Books', 1.00, 15),
(6, 'red rose', 1.00, 16),
(7, 'Drawing book', 3.00, 17),
(8, 'Full thali', 3.00, 18),
(9, 'Coffee', 3.00, 20),
(10, 'Tea', 10.00, 20),
(11, 'Coffee', 1.00, 22),
(12, 'Tea', 1.00, 22),
(13, 'Gathiya', 5.00, 22),
(14, 'Kasumbo', 1.00, 23),
(15, 'Tikki', 1.00, 24),
(16, 'Burger', 1.00, 24),
(17, 'Ganthiya', 1.00, 25),
(18, 'salt', 1.00, 26),
(19, 'dal', 1.00, 26),
(20, 'dal', 1.00, 29),
(21, 'books', 2.00, 40),
(22, 'Full thali', 6.00, 41),
(23, 'Books', 8.00, 42),
(24, 'Full thali', 1.00, 45),
(25, 'Books', 3.00, 46),
(26, 'tedt', 1.00, 49),
(27, 'Chicken', 3.00, 51),
(28, 'test 1', 1.00, 52),
(29, 'drawing books', 3.00, 53),
(30, 'books', 1.00, 54),
(31, 'chicken', 1.00, 55),
(32, 'aloo', 1.00, 56),
(33, 'aloo', 1.00, 57),
(34, 'aloo', 1.00, 60),
(35, 'chicken', 1.00, 61),
(36, 'chicken', 1.00, 62),
(37, 'chicken', 1.00, 63),
(38, 'chicken', 1.00, 64),
(39, 'item 1', 1.00, 65),
(40, 'item 1', 1.00, 66),
(41, 'bxnxn', 1.00, 67),
(42, 'jxjxj', 1.00, 68),
(43, 'nxnxn', 1.00, 69),
(44, 'Tikki', 1.00, 72),
(45, 'Burger', 3.00, 72),
(46, 'Drawing books', 1.00, 73),
(47, 'Pen', 1.00, 74),
(48, 'Books', 3.00, 74),
(49, 'test', 1.00, 77),
(50, 'ggggggg', 2.00, 78),
(51, 'bank statements', 1.00, 79),
(52, 'pan card', 1.00, 79),
(53, 'dal', 1.00, 80),
(54, 'gggh', 1.00, 81),
(55, 'pizza', 1.00, 82),
(56, 'Aloo tikki', 1.00, 83),
(57, 'Burger', 1.00, 83),
(58, 'Aloo tikki', 1.00, 84),
(59, 'Burger', 1.00, 84),
(60, 'Aloo', 1.00, 89),
(61, 'aloo', 1.00, 90),
(62, 'Aloo tikki', 1.00, 91),
(63, 'Burger', 1.00, 91),
(64, 'Poteto', 1.00, 92),
(65, 'Ringna', 1.00, 92),
(66, 'aloo', 1.00, 96),
(67, 'books', 1.00, 97),
(68, 'Besan', 1.00, 99),
(69, 'Khajur', 3.00, 99),
(70, 'aloo', 1.00, 100),
(71, 'anything', 1.00, 101),
(72, 'bangan', 1.00, 110),
(73, 'milk 1 pack', 1.00, 111),
(74, 'potat', 1.00, 112),
(75, 'paratha', 1.00, 113),
(76, 'dal', 1.00, 121),
(77, 'burger', 1.00, 123),
(78, 'mug', 1.00, 126),
(79, 'blondie 250', 1.00, 128),
(80, 'mug', 1.00, 131),
(81, 'bhindo', 1.00, 132),
(82, 'paratha', 1.00, 134),
(83, 'burger', 4.00, 162),
(84, 'bokks', 2.00, 163),
(85, 'burger', 1.00, 174),
(86, 'aloo', 1.00, 175),
(87, 'French Fries', 1.00, 178),
(88, 'Burger', 1.00, 178),
(89, 'Undhyu', 1.00, 179),
(90, 'Rice', 1.00, 180),
(91, 'Roti', 1.00, 182),
(92, 'Full thali', 2.00, 183),
(93, 'Khajur', 3.00, 183),
(94, 'Full thali', 2.00, 184),
(95, 'Apple', 1.00, 185),
(96, 'Full thali', 2.00, 187),
(97, 'Brinjal', 9.00, 190),
(98, 'potatoes', 5.00, 190),
(99, 'burger', 4.00, 191),
(100, 'tomato', 7.00, 192),
(101, 'tomato', 2.00, 202),
(102, 'potato', 4.00, 202),
(103, 'meggie', 2.00, 202),
(104, 'dress', 1.00, 203),
(105, 'food', 1.00, 203),
(106, 'paper', 1.00, 203),
(107, 'mix', 1.00, 204),
(108, 'mix', 1.00, 204),
(109, 'mix', 1.00, 204),
(110, 'mix', 1.00, 205),
(111, 'potato', 1.00, 205),
(112, 'potato', 1.00, 211),
(113, 'aloo', 2.00, 211),
(114, 'meggies', 3.00, 211),
(115, 'potato', 1.00, 212),
(116, 'aloo', 2.00, 212),
(117, 'meggies', 3.00, 212),
(118, 'item 2', 3.00, 213),
(119, 'item 1', 3.00, 213),
(120, 'item 3', 1.00, 213),
(121, 'potato', 1.00, 214),
(122, 'aloo', 2.00, 214),
(123, 'meggies', 3.00, 214),
(124, 'meggies', 2.00, 216),
(125, 'aloo', 1.00, 216),
(126, 'poteto', 4.00, 217),
(127, 'aloo', 1.00, 217),
(128, 'pizza', 2.00, 221),
(129, 'burger', 2.00, 221),
(130, 'potato', 2.00, 225),
(131, 'aloo', 1.00, 225),
(132, 'potato', 2.00, 226),
(133, 'aloo', 1.00, 226),
(134, 'tikki', 1.00, 228),
(135, 'burger', 2.00, 228),
(136, 'aloo', 1.00, 230),
(137, 'aloo', 1.00, 231),
(138, 'aloo', 1.00, 234),
(139, 'aloo', 1.00, 236),
(140, 'burger', 1.00, 237),
(141, 'Dudhi', 2.00, 239),
(142, 'bhindi', 4.00, 239),
(143, 'burger', 1.00, 241),
(144, 'also tikki', 2.00, 241),
(145, 'pen drives', 3.00, 243),
(146, 'laptop', 1.00, 243),
(147, 'papers', 1.00, 243),
(148, 'paratha', 8.00, 244),
(149, 'Glass JAR', 2.00, 246),
(150, 'Amul milk', 1.00, 246),
(151, 'paratha', 0.00, 251),
(152, 'toothbrush', 4.00, 254),
(153, 'toothpaste', 1.00, 254),
(154, 'brinjal\'s', 1.00, 254),
(155, 'abc', 1.00, 255),
(156, 'naan', 4.00, 256),
(157, 'sabji', 2.00, 256),
(158, 'burger', 1.00, 259),
(159, 'chiki', 1.00, 259),
(160, 'Burger', 1.00, 261),
(161, 'Aloof tiki', 2.00, 261),
(162, 'item', NULL, 264),
(163, 'potato', 1.00, 266),
(164, 'paratha', 4.00, 267),
(165, 'powder', 1.00, 269),
(166, 'sugar', 1.00, 269),
(167, 'wafer', 1.00, 269),
(168, 'banana', 1.00, 270),
(169, 'nan', 1.00, 271),
(170, 'item', 1.00, 275),
(171, 'item', 1.00, 276),
(172, 'ite', 1.00, 277),
(173, 'burger', 1.00, 278),
(174, 'poteto', 1.00, 279),
(175, 'Full thali', 2.00, 280),
(176, 'Tometo', 100.00, 281),
(177, 'Potato', 1.00, 281),
(178, 'Bhindi', 1.00, 281),
(179, 'books', 2.00, 282),
(180, 'Pizza', 2.00, 283),
(181, 'Burger', 1.00, 283),
(182, 'Cable', 2.00, 284),
(183, 'Laptop', 1.00, 284),
(184, 'pen drive', 3.00, 284),
(185, 'bags', 5.00, 286),
(186, 'potato', 3.00, 288),
(187, 'banana', 11.00, 290),
(188, 'paper', 1.00, 291),
(189, 'burger', 1.00, 293),
(190, 'suger', 1.00, 294),
(191, 'chilli', 1.00, 295),
(192, 'cloths', 1.00, 296),
(193, 'Cloths', 1.00, 297),
(194, 'French Fries', 1.00, 301),
(195, 'Burger', 1.00, 301),
(196, 'Coke', 1.00, 301),
(197, 'Butter', 1.00, 302),
(198, 'Cheese', 1.00, 302),
(199, 'Potatoes', 1.00, 302),
(200, 'Melon', 1.00, 307),
(201, 'brinjal', 1.00, 308),
(202, 'tomatoes', 2.00, 309),
(203, 'lasan', 1.00, 310),
(204, 'onion', 4.00, 312),
(205, 'tameta', 1.00, 313),
(206, 'Tea', 1.00, 314),
(207, 'Sugar', 1.00, 315),
(208, 'Bitterguard', 2.00, 316),
(209, 'potato', 1.00, 330),
(210, 'Bhindi', 1.00, 331),
(211, 'burger', 1.00, 332),
(212, 'books', 1.00, 333),
(213, 'notebokk', 1.00, 334),
(214, 'Panipuri', 1.00, 335),
(215, 'bhindi', 2.00, 336),
(216, 'Poteto', 12.00, 337),
(217, 'Tometo', 2.00, 337),
(218, 'Poteto', 1.00, 338),
(219, 'Tometo', 1.00, 338),
(220, 'books', 19.00, 339),
(221, 'pen', 16.00, 339),
(222, 'tomato', 1.00, 340),
(223, 'Pitza', 1.00, 341),
(224, 'Sugar', 1.00, 342),
(225, 'Poteto', 1.00, 343),
(226, 'Burger', 1.00, 344),
(227, 'Poteto', 1.00, 345),
(228, 'Books', 1.00, 346),
(229, 'milk shake', 1.00, 348),
(230, 'papad', 1.00, 348),
(231, 'shampoo', 1.00, 349),
(232, 'soap', 1.00, 349),
(233, 'namkeen', 1.00, 349),
(234, 'banana', 1.00, 350),
(235, 'tomato', 1.00, 351),
(236, 'Aloo tikki', 12.00, 353),
(237, 'Burger', 1.00, 354),
(238, 'Books', 4.00, 355),
(239, 'Bhindi', 1.00, 356),
(240, 'Aloo', 1.00, 356),
(241, 'Burger', 1.00, 358),
(242, 'Aloo tikki', 3.00, 358),
(243, 'Books', 1.00, 359),
(244, 'Pen', 3.00, 359),
(245, 'Aloo', 1.00, 360),
(246, 'Bhindi', 18.00, 360),
(247, 'Rose', 4.00, 361),
(248, 'Mango', 3.00, 361),
(249, 'Books', 1.00, 362),
(250, 'Poteto', 1.00, 362),
(251, 'Dhosa', 1.00, 363),
(252, 'Salt', 1.00, 364),
(253, 'Bhindi', 1.00, 365),
(254, 'check', 1.00, 366),
(255, 'tomato', 1.00, 367),
(256, 'Panipuri', 1.00, 368),
(257, 'Full pizza', 1.00, 369),
(258, 'Gathiya', 1.00, 370),
(259, 'Gathiya', 1.00, 371),
(260, 'Jalebi', 1.00, 371),
(261, 'books', 1.00, 372),
(262, 'Pizza', 1.00, 373),
(263, 'Books', 1.00, 374),
(264, 'Pen', 1.00, 375),
(265, 'Burger', 1.00, 376),
(266, 'Aloo tikki', 1.00, 377),
(267, 'Books', 1.00, 378),
(268, 'pen', 1.00, 379),
(269, 'Bhindi', 1.00, 380),
(270, 'Kalingan', 1.00, 381),
(271, 'Book', 1.00, 382),
(272, 'Bhindi', 1.00, 382),
(273, 'potato', 1.00, 384),
(274, 'chapati', 1.00, 385),
(275, 'tea powder', 1.00, 387),
(276, 'sugar', 1.00, 387),
(277, 'Dhosa', 1.00, 388),
(278, 'etst', 1.00, 390),
(279, 'Pizza', 1.00, 391),
(280, 'Burger', 1.00, 391),
(281, 'Books', 1.00, 393),
(282, 'pen', 1.00, 393),
(283, 'Bhindi', 1.00, 394),
(284, 'Aloo', 1.00, 394);

-- --------------------------------------------------------

--
-- Table structure for table `double_google_order_photos`
--

CREATE TABLE `double_google_order_photos` (
  `id` int(11) NOT NULL,
  `pickup_location_photo` varchar(255) DEFAULT NULL,
  `pickup_material_photo` varchar(255) DEFAULT NULL,
  `pickup_challan_photo` varchar(255) DEFAULT NULL,
  `delivered_location_photo` varchar(255) DEFAULT NULL,
  `delivered_material_photo` varchar(255) DEFAULT NULL,
  `delivered_challan_photo` varchar(255) DEFAULT NULL,
  `double_google_order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `double_google_order_photos`
--

INSERT INTO `double_google_order_photos` (`id`, `pickup_location_photo`, `pickup_material_photo`, `pickup_challan_photo`, `delivered_location_photo`, `delivered_material_photo`, `delivered_challan_photo`, `double_google_order_id`) VALUES
(6, '249cdac30bfe612064df5b9af027ff6e.png', '249cdac30bfe612064df5b9af027ff6e.png', '249cdac30bfe612064df5b9af027ff6e.png', '3e97d84189bffc4594f4f40e6ed5adae.png', '3e97d84189bffc4594f4f40e6ed5adae.png', '3e97d84189bffc4594f4f40e6ed5adae.png', 393);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternate_phone` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address3` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` int(6) DEFAULT NULL,
  `aadhar_no` varchar(19) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aadhar_card_photo` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_photo` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_no` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `otp` int(11) DEFAULT NULL,
  `otp_expire_time` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `name`, `email`, `phone`, `alternate_phone`, `address1`, `address2`, `address3`, `city_id`, `postcode`, `aadhar_no`, `aadhar_card_photo`, `license_no`, `license_photo`, `passport_photo`, `vehicle_no`, `status`, `otp`, `otp_expire_time`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(13, 'Dvs', '149dvs@gmail.com', '7016697110', NULL, 'as', NULL, NULL, '1', 366003, '1234-5678-4555-5978', NULL, '1', NULL, '2f54c922cdd395c5603fb7195750888a.jpg', 'gj09jj9999', 'Y', 665179, '2020-08-28 10:36:38', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `driver_location`
--

CREATE TABLE `driver_location` (
  `id` int(11) NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `double_google_order_id` int(11) DEFAULT NULL,
  `driver_lat` varchar(20) DEFAULT NULL,
  `driver_long` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver_location`
--

INSERT INTO `driver_location` (`id`, `driver_id`, `double_google_order_id`, `driver_lat`, `driver_long`) VALUES
(1, 5, 241, '23', '76.696969'),
(2, 5, 240, '0', '0'),
(3, 5, 4, '23', '76.151542'),
(7, 13, 391, '1.2225500345230103', '1.3'),
(8, 13, 392, '1.255519986152649', '1.2'),
(9, 13, 393, '1.6499999', '1.2142');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `subject` text DEFAULT NULL,
  `decription` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `subject`, `decription`) VALUES
(1, 'Thank you for register with Callat7', '<h2>Dear ##USERNAME##,</h2>\r\n<p>Thank you for register with Callat7.</p>\r\n\r\n<p>While login use your registered mobile number as username. Your password is: ##PASSWORD##</p>\r\n\r\n<p>Thanks</p>\r\n<p>Callat7</p>\r\n'),
(2, 'New User register at Callat7', '<h2>Dear Admin,</h2>\r\n<p>New user has been registered at Callat7.</p> \r\n<p>Kindly acknowledge.</p> \r\n<p>Thanks</p>\r\n<p>Call at 7</p>'),
(3, 'Thank you for your order at Callat7', '<h2>Dear ##USERNAME##,</h2>\r\n\r\n<p>Your order ##ORDERNUMBER## has been placed successfully. We will call back you soon!</p>\r\n\r\n<p>Thanks</p>\r\n<p>Callat7</p>\r\n'),
(4, 'New order placed at Callat7', '<h2>Dear Admin,</h2>\r\n\r\n<p>##USERNAME## has placed an order ##ORDERNUMBER##.</p>\r\n\r\n<p>Thanks</p>\r\n<p>Callat7</p>\r\n'),
(5, 'Your Callat7 password', '<h1>Dear ##USERNAME##,</h1>\r\n<p>Your Callat7 password is: ##PASSWORD##</p>\r\n<p>Thanks</p>\r\n<p>Callat7</p>\r\n'),
(6, 'Callat7 order status update', '<h2>Dear ##CUSTOMERNAME##,<h2>\r\n\r\n<p>Your order ##ORDERNUMBER## status has been updated to ##ORDERSTATUS##.</p>\r\n\r\n<p>Thanks</p>\r\n<p>Callat7</p>\r\n'),
(7, 'Callat7 order delivered.', '<h2>Dear ##RECEIPIENT##,</h2>\r\n<p>You have recently received a parcel from ##SENDERNAME##.</p>\r\n<p>Thanks</p>\r\n<p>Callat7</p>\r\n'),
(8, 'Your Callat7 order has been delivered.', '<h2>Dear ##CUSTOMERNAME##,</h2>\r\n<p>Your Callat7 order ##ORDERNUMBER## has been received by ##RECEIPIENT##.</p>\r\n<p>Thanks</p>\r\n<p>Callat7</p>\r\n'),
(9, 'Your Callat7 Profile update', '<h2>Dear ##CUSTOMERNAME##,</h2>\r\n\r\n<p>You have recently updated your Callat7 profile.</p>\r\n\r\n<p>Thanks</p>\r\n<p>Callat7</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `global_setting`
--

CREATE TABLE `global_setting` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `setting_key` varchar(255) NOT NULL,
  `setting_value` text NOT NULL,
  `status` enum('y','n') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `global_setting`
--

INSERT INTO `global_setting` (`id`, `name`, `description`, `setting_key`, `setting_value`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'OpenTime', 'Contains opening and closing time', 'OPENTIME', '{\"open\":\"7:00\",\"close\":\"20:45\"}', 'y', '2020-07-13 11:11:30', '2020-07-05 18:30:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `guest_customer`
--

CREATE TABLE `guest_customer` (
  `id` int(11) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `guest_customer_remark`
--

CREATE TABLE `guest_customer_remark` (
  `id` int(11) NOT NULL,
  `guest_customer_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_06_15_100726_create_price_table', 1),
(4, '2020_06_15_103426_create_customer_table', 1),
(5, '2020_06_15_105908_create_driver_table_table', 1),
(6, '2020_06_15_110257_create_order_status_table_table', 1),
(7, '2020_06_15_110834_create_order_table', 1),
(8, '2020_06_15_121709_create_cities_table', 2),
(9, '2020_06_17_053907_add_pincode_to_order_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `parcel_detail` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` float(10,2) NOT NULL,
  `weight_type` enum('Kg','gm') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Kg',
  `notes` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_email` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_mobile` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_address_1` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_address_2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_address_3` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_city` int(10) UNSIGNED NOT NULL,
  `sender_pincode` int(10) UNSIGNED DEFAULT NULL,
  `sender_longitute` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_latitude` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_email` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_mobile` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_address_1` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_address_2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_address_3` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_city` int(10) UNSIGNED NOT NULL,
  `receiver_pincode` int(10) UNSIGNED DEFAULT NULL,
  `receiver_longitute` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_latitude` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_distance` float(10,2) NOT NULL,
  `price` float(10,2) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` int(10) UNSIGNED NOT NULL,
  `driver_id` int(10) UNSIGNED DEFAULT NULL,
  `driver_notes` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `parcel_detail`, `weight`, `weight_type`, `notes`, `sender_name`, `sender_email`, `sender_mobile`, `sender_address_1`, `sender_address_2`, `sender_address_3`, `sender_city`, `sender_pincode`, `sender_longitute`, `sender_latitude`, `receiver_name`, `receiver_email`, `receiver_mobile`, `receiver_address_1`, `receiver_address_2`, `receiver_address_3`, `receiver_city`, `receiver_pincode`, `receiver_longitute`, `receiver_latitude`, `total_distance`, `price`, `order_date`, `order_status`, `driver_id`, `driver_notes`) VALUES
(48, 16, 'book', 5.00, 'Kg', 'sjbbkdnk', 'johndoe', 'playstorecnx29@gmail.com', '6364908612', 'rajkot', 'abja', 'ajbjbs', 1, 360001, '70.8021599', '22.3038945', 'jay', 'playstorecnx28@gmail.com', '6364908611', 'abjs', 'aubube', 'ajbebi', 1, 360001, '70.8021599', '22.3038945', 0.00, 49.00, '2020-07-07', 1, NULL, NULL),
(49, 17, 'test', 1.00, 'Kg', 'testing', 'abc', 'abc@gmail.com', '9658908569', 'adddd', NULL, NULL, 1, 360005, '70.758349', '22.294898', 'test', 'test@yahoo.com', '4875467845', 'address 2 2 2 2', NULL, NULL, 1, 360002, '70.7673822', '22.3156625', 2.48, 49.00, '2020-07-08', 1, NULL, NULL),
(50, 18, 'Title', 5.00, 'Kg', 'Title', 'Jagdish', 'jagdish@webzexperts.com', '8566778899', 'Rivera Wave', 'Kalawad road', NULL, 1, 360007, '70.7569436', '22.2730401', 'Divyesh', 'divyesh@gmail.com', '8866778800', 'Racecourse', 'Sadar road', NULL, 1, 360005, '70.7964128', '22.2985544', 4.95, 999.00, '2020-07-08', 1, NULL, NULL),
(51, 19, 'Book', 2.00, 'Kg', 'nirmal', 'nirmal', 'nirmalkrishnam@gmail.com', '9825790687', 'rajkot', 'rajkot', 'rajkot', 1, 360001, '70.8021599', '22.3038945', 'nirmal', 'nirmalkrishnam@gmail.com', '9825790687', 'rajkot', 'rajkot', 'rajkot', 1, 360001, '70.8021599', '22.3038945', 0.00, 49.00, '2020-07-08', 1, NULL, NULL),
(52, 19, 'a', 1.00, 'gm', '1', 'a', 'nirmalkrishnam@gmail.com', '1', 'q', 'q', 'q', 1, 1, '70.8021599', '22.3038945', 'a', 'nirmalkrishnam@gmail.com', '1', 'q', 'q', 'q', 1, 1, '70.8021599', '22.3038945', 0.00, 49.00, '2020-07-08', 1, NULL, NULL),
(53, 19, 'm', 1.00, 'Kg', 'home', 'q', 'nirmalkrishnam@gmail.com', '1', 'q', 'q', 'q', 1, 1, '70.8021599', '22.3038945', 'q', 'nirmalkrishnam@gmail.com', '1', 'q', 'q', 'q', 1, 1, '70.8021599', '22.3038945', 0.00, 49.00, '2020-07-08', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_address`
--

CREATE TABLE `order_address` (
  `id` int(11) NOT NULL,
  `sender_name` varchar(255) DEFAULT NULL,
  `pickup_address` text DEFAULT NULL,
  `pickup_phone` varchar(20) DEFAULT NULL,
  `pickup_date` date DEFAULT NULL,
  `pickup_time` time DEFAULT NULL,
  `pickup_comment` text DEFAULT NULL,
  `pickup_lat` double DEFAULT NULL,
  `pickup_long` double DEFAULT NULL,
  `delivery_receiver_name` varchar(255) DEFAULT NULL,
  `delivery_address` text DEFAULT NULL,
  `delivery_phone` varchar(20) DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `delivery_time` time DEFAULT NULL,
  `delivery_comment` text DEFAULT NULL,
  `delivery_status` enum('pending','delivered','failed') NOT NULL DEFAULT 'pending',
  `delivery_status_reason` text DEFAULT NULL,
  `pickup_distance` float NOT NULL DEFAULT 0,
  `delivery_distance` float NOT NULL DEFAULT 0,
  `delivery_lat` double DEFAULT NULL,
  `delivery_long` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `double_google_order_id` int(11) NOT NULL,
  `payment_status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_address`
--

INSERT INTO `order_address` (`id`, `sender_name`, `pickup_address`, `pickup_phone`, `pickup_date`, `pickup_time`, `pickup_comment`, `pickup_lat`, `pickup_long`, `delivery_receiver_name`, `delivery_address`, `delivery_phone`, `delivery_date`, `delivery_time`, `delivery_comment`, `delivery_status`, `delivery_status_reason`, `pickup_distance`, `delivery_distance`, `delivery_lat`, `delivery_long`, `created_at`, `created_by`, `updated_at`, `updated_by`, `double_google_order_id`, `payment_status_id`) VALUES
(1, 'Nishi', 'KANHAI yagnik road rajkot', '9925071615', '2020-07-27', '11:14:00', 'home', 22.2927365, 70.7914597, 'nirmal', 'krishnam sir lakhajiraj road rajkot', '9825790687', '2020-07-27', '10:14:00', 'store', 'pending', NULL, 1.58, 1.58, 22.2977, 70.8058439, '2020-07-27 09:17:09', 1, '2020-07-27 09:17:09', 1, 1, NULL),
(2, 'Nishi', 'kanhai rajkot', '9925071615', '2020-07-27', '11:19:00', 'home', 22.2927365, 70.7914597, 'nirmal', 'krishnam rajkot', '9825790687', '2020-07-27', '12:45:00', 'shop', 'pending', NULL, 1.58, 1.58, 22.2977, 70.8058439, '2020-07-27 09:21:42', 1, '2020-07-27 09:21:42', 1, 2, NULL),
(3, 'Nishi', 'kanhai rajkot', '9925071615', '2020-07-27', '10:21:00', 'home', 22.2927365, 70.7914597, 'nirmal', 'krishnam rajkot', '9925071615', '2020-07-27', '11:21:00', 'store', 'pending', NULL, 1.58, 1.58, 22.2977, 70.8058439, '2020-07-27 09:25:34', 1, '2020-07-27 09:25:34', 1, 3, NULL),
(4, 'Nishi', 'kanhai rajkot', '9925071615', '2020-07-27', '10:21:00', 'home', 22.2927365, 70.7914597, 'cheeku', 'Pacific rajkot', '9638769607', '2020-07-27', '11:24:00', 'home', 'pending', NULL, 0.01, 1.59, 22.292704, 70.7913289, '2020-07-27 09:25:34', 1, '2020-07-27 09:25:34', 1, 3, NULL),
(5, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-07-27', '11:14:00', NULL, 0, 0, 'Jaydeep Bhatt', 'My Home', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-27 10:15:01', 1, '2020-07-27 10:15:01', 1, 4, NULL),
(6, 'Jaydeep Bhatt', 'Nanavati chowk,Rajkot', '9033348602', '2020-07-27', '11:15:00', 'comment for jaydeep pickup', 22.3054267, 70.7684229, 'keval bhai', 'Speed well,Rajkot', '9879944744', '2020-07-27', '11:15:00', 'comment for legal Bhai - delivery', 'pending', NULL, 4.04, 1.22, 22.2689454, 70.7704147, '2020-07-27 10:18:40', 1, '2020-07-27 10:18:40', 1, 5, NULL),
(7, 'Jaydeep Bhatt', 'Nanavati chowk,Rajkot', '9033348602', '2020-07-27', '11:15:00', 'comment for jaydeep pickup', 22.3054267, 70.7684229, 'Divyesh bhai', 'Moti tanki chowk,Rajkot', '9879944744', '2020-07-27', '11:15:00', 'Comment for delivery - divyeshbhai', 'pending', NULL, 3.02, 3.02, 22.2964168, 70.7960438, '2020-07-27 10:18:40', 1, '2020-07-27 10:18:40', 1, 5, NULL),
(8, 'Jaydeep Bhatt', 'Nanavati chowk,Rajkot', '9033348602', '2020-07-27', '11:15:00', 'comment for jaydeep pickup', 22.3054267, 70.7684229, 'jagdish bhai', 'Mota mava main road,Rajkot', '9898989898', '2020-07-27', '11:15:00', 'comment for Jagdish Bhai - delivery', 'pending', NULL, 4.99, 5.25, 22.2606432, 70.7626295, '2020-07-27 10:18:40', 1, '2020-07-27 10:18:40', 1, 5, NULL),
(9, 'Jaydeep Bhatt', 'Munjka , Rajkot', '9033348602', '2020-07-27', '14:00:00', 'Comment for pickup', 22.2930753, 70.7436094, 'Divyesh bhai', 'Saurashtra university,Rajkto', '9601523556', '2020-07-27', '14:00:00', 'comment for deliver', 'pending', NULL, 0.26, 0.26, 22.2908247, 70.7430321, '2020-07-27 13:02:42', 1, '2020-07-27 13:02:42', 1, 6, NULL),
(10, 'Adingo Foods', 'Subhash Road, Limda Chowk, Near, Sadar, Rajkot, Gujarat 360002', '9925071615', '2020-07-27', '14:50:00', NULL, 0, 0, 'Nishi', 'kanhai rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-27 13:52:21', 1, '2020-07-27 13:52:21', 1, 7, NULL),
(11, 'Reliance Mall', 'Plot No 2/A, Survey No 30, 150 Feet Ring Rd, Opposite Big Bazaar, Nana Mava, Rajkot, Gujarat 360005', '9925071615', '2020-07-27', '14:53:00', NULL, 0, 0, 'Nishi', 'kanhai rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-27 13:54:17', 1, '2020-07-27 13:54:17', 1, 8, NULL),
(12, 'cat', 'mouse rajkot', '1234567891', '2020-07-28', '15:00:00', 'home', 22.290354, 70.794996, 'mouse', 'cat rajkot', '1234567891', '2020-07-27', '15:00:00', 'shop', 'pending', NULL, 2.61, 2.61, 22.2853153, 70.7702312, '2020-07-27 14:02:40', 1, '2020-07-27 14:02:40', 1, 9, NULL),
(13, 'Nishi', 'kanhai rajkot', '9825790687', '2020-07-27', '15:03:00', NULL, 22.2927365, 70.7914597, 'nirmal', 'kanhai rajkot', '9825790687', '2020-07-27', '15:03:00', NULL, 'pending', NULL, 0, 0, 22.2927365, 70.7914597, '2020-07-27 14:04:43', 1, '2020-07-27 14:04:43', 1, 10, NULL),
(14, 'Nishi', 'kanhai rajkot', '9825790687', '2020-07-27', '15:03:00', NULL, 22.2927365, 70.7914597, 'nirmal', 'kanhai rajkot', '9825790687', '2020-07-27', '15:03:00', NULL, 'pending', NULL, 0, 0, 22.2927365, 70.7914597, '2020-07-27 14:05:08', 1, '2020-07-27 14:05:08', 1, 11, NULL),
(15, 'Nishi', 'kanhai rajkot', '9825790687', '2020-07-27', '15:03:00', NULL, 22.2927365, 70.7914597, 'nirmal', 'kanhai rajkot', '9825790687', '2020-07-27', '15:03:00', NULL, 'pending', NULL, 0, 0, 22.2927365, 70.7914597, '2020-07-27 14:05:18', 1, '2020-07-27 14:05:18', 1, 12, NULL),
(16, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-07-27', '16:37:00', NULL, 0, 0, 'Jaydeep Bhatt', 'My Home', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-27 15:37:59', 1, '2020-07-27 15:37:59', 1, 13, NULL),
(17, 'Jaydeep Bhatt', 'Nanavati chowk,Rajkot', '9033348602', '2020-07-27', '16:37:00', NULL, 22.3054267, 70.7684229, 'Divu bhai', 'Rajkot', '9879944744', '2020-07-27', '16:37:00', NULL, 'pending', NULL, 3.48, 3.48, 22.3038945, 70.8021599, '2020-07-27 15:39:03', 1, '2020-07-27 15:39:03', 1, 14, NULL),
(18, 'Ravi prakashan,Rajkot', 'Ravi prakashan,Rajkot', '9033348602', '2020-07-27', '17:37:00', NULL, 0, 0, 'Jaydeep Bhatt', 'My Home', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-27 16:38:36', 1, '2020-07-27 16:38:36', 1, 15, NULL),
(19, 'university road', 'university road', '9825998125', '2020-07-27', '22:16:00', NULL, 0, 0, 'hitesh', 'kalawad road', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-27 21:17:14', 1, '2020-07-27 21:17:14', 1, 16, NULL),
(20, 'Reliance Mall', 'Plot No 2/A, Survey No 30, 150 Feet Ring Rd, Opposite Big Bazaar, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-07-28', '09:49:00', NULL, 0, 0, 'Jaydeep Bhatt', 'My Home', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-28 08:50:02', 1, '2020-07-28 08:50:02', 1, 17, NULL),
(21, 'The Grand Thakar', 'Jawahar Rd, Opposite Jubilee Garden, Sadar, Rajkot, Gujarat 360001', '9033348602', '2020-07-28', '10:04:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Satyanarayan Park, - 1/44,Nanavati chowk,Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-28 09:05:58', 1, '2020-07-28 09:05:58', 1, 18, NULL),
(22, 'Jaydeep Bhatt', 'Rajkot', '9033348602', '2020-07-28', '10:13:00', NULL, 22.3038945, 70.8021599, 'Arind bhai', 'Rajkot', '9879944744', '2020-07-28', '10:13:00', NULL, 'pending', NULL, 0, 0, 22.3038945, 70.8021599, '2020-07-28 09:14:42', 1, '2020-07-28 09:14:42', 1, 19, NULL),
(23, '302, Rivera wave, Kalawad Road', '302, Rivera wave, Kalawad Road', '9033348602', '2020-07-28', '10:25:00', NULL, 0, 0, 'Jaydeep M Bhatt', 'Nanavati chowk,Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-28 09:27:06', 1, '2020-07-28 09:27:06', 1, 20, NULL),
(24, 'Rahul Bhattacharya', 'Nana mava main road,Rajkot', '9033348602', '2020-07-28', '10:30:00', 'Comment for pickup,Rahul bhatacharya', 22.2689454, 70.7704147, 'Jaydeep Bhatt', 'Nanavati chowk,Rajkot', '9879944744', '2020-07-28', '10:30:00', 'Comment for delivery ,jaydeep bhatt', 'pending', NULL, 4.04, 4.04, 22.3054267, 70.7684229, '2020-07-28 09:32:22', 1, '2020-07-28 09:32:22', 1, 21, NULL),
(25, 'Balaji Super Market', 'Aval Complex, Ground FLoor, University Road, Panchayat Nagar Chowk, Rajkot, Gujarat 360005', '9033348602', '2020-07-28', '10:48:00', NULL, 0, 0, 'Amar sinh Chodhri', 'Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-28 09:49:42', 1, '2020-07-28 09:49:42', 1, 22, NULL),
(26, 'Reliance Mall', 'Plot No 2/A, Survey No 30, 150 Feet Ring Rd, Opposite Big Bazaar, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-07-28', '11:04:00', NULL, 0, 0, 'Rajendra bapu', 'Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-28 09:59:00', 1, '2020-07-28 09:59:00', 1, 23, NULL),
(27, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-07-28', '15:05:00', NULL, 0, 0, 'Jaydeep bhatt', 'My Home', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-28 14:06:51', 1, '2020-07-28 14:06:51', 1, 24, NULL),
(28, 'Joker', 'Joker', '2907202000', '2020-07-29', '00:58:00', NULL, 0, 0, 'Hitesh 29/7/20', 'test', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-28 23:59:57', 1, '2020-07-28 23:59:57', 1, 25, NULL),
(29, 'D Mart', 'Kuvadava Rd, near Green Land Circle, Navagam, Rajkot, Gujarat 360003', '2907202000', '2020-07-29', '01:00:00', NULL, 0, 0, 'Hitesh 29/7/20', 'test', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-29 00:01:56', 1, '2020-07-29 00:01:56', 1, 26, NULL),
(30, 'Nirmalbhai', 'kanhai test test test rajkot', '2907202001', '2020-07-29', '01:04:00', NULL, 22.3038945, 70.8021599, 'hitesh', 'Garden test test test rajkot', '2907202002', '2020-07-29', '10:05:00', NULL, 'pending', NULL, 0, 0, 22.3038945, 70.8021599, '2020-07-29 00:08:05', 1, '2020-07-29 00:08:05', 1, 27, NULL),
(31, 'Nirmalbhai', 'kanhai test test test rajkot', '2907202001', '2020-07-29', '01:04:00', NULL, 22.3038945, 70.8021599, 'hitesh', 'Garden test test test rajkot', '2907202002', '2020-07-29', '10:05:00', NULL, 'pending', NULL, 0, 0, 22.3038945, 70.8021599, '2020-07-29 00:08:06', 1, '2020-07-29 00:08:06', 1, 28, NULL),
(32, 'Chandan', 'Chandan', '9327647270', '2020-07-29', '01:11:00', NULL, 0, 0, 'Agri Begri', 'Chandan', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-29 00:12:43', 1, '2020-07-29 00:12:43', 1, 29, NULL),
(33, 'Jaydeep bhatt', 'Nanavati Chowk,Rajkot', '9033348602', '2020-07-29', '10:41:00', 'Pickup comment', 22.3054267, 70.7684229, 'Jagdish bhai', 'Indira circle, 150 ft Ring road, Rajkot', '9601523556', '2020-07-29', '10:41:00', 'delivery comment for Jagdish bhai', 'pending', NULL, 1.91, 1.91, 22.2883584, 70.771395, '2020-07-29 09:37:58', 1, '2020-07-29 09:37:58', 1, 30, NULL),
(34, 'Jaydeep bhatt', 'Nanavati Chowk,Rajkot', '9033348602', '2020-07-29', '10:41:00', 'Pickup comment', 22.3054267, 70.7684229, 'Keval bhai', 'Mavdi chowkdi, 150 ft Ring road, Rajkot', '9033348603', '2020-07-29', '10:41:00', 'delivery comment for Keval bhai', 'pending', NULL, 5.04, 3.19, 22.2629378, 70.7859067, '2020-07-29 09:37:58', 1, '2020-07-29 09:37:58', 1, 30, NULL),
(35, 'Jaydeep bhatt', 'Nanavati chowk,150 ft Ring road, Rajkot', '9033348602', '2020-07-29', '11:38:00', 'pickup comment', 22.3053961, 70.7683508, 'Parth bhai', 'Paddhari Toll Naka,Khijadiya Nana,Gujarat', '9601523556', '2020-07-29', '11:38:00', 'comment for delivery parth bhai', 'pending', NULL, 24.61, 24.61, 22.4463116, 70.5835858, '2020-07-29 10:35:05', 1, '2020-07-29 10:35:05', 1, 31, NULL),
(36, 'Jaydeep bhatt', 'Saurashtra University,Rajkot', '9033348602', '2020-07-29', '12:13:00', 'pickup comment', 22.2908247, 70.7430321, 'Keval bhai', 'Jam Khambhaliya, Gujarat', '8588858885', '2020-07-29', '12:13:00', 'delivery comment for Keval bhai', 'pending', NULL, 112.17, 50.53, 22.2052603, 69.6587765, '2020-07-29 11:11:15', 1, '2020-07-29 11:11:15', 1, 32, NULL),
(37, 'Jaydeep bhatt', 'Saurashtra University,Rajkot', '9033348602', '2020-07-29', '12:13:00', 'pickup comment', 22.2908247, 70.7430321, 'Arvind bhai', 'Gondal, Gujarat', '9601523556', '2020-07-29', '12:13:00', 'delivery comment for Arvind bhai', 'pending', NULL, 36.88, 36.88, 21.9611708, 70.7938777, '2020-07-29 11:11:15', 1, '2020-07-29 11:11:15', 1, 32, NULL),
(38, 'Jaydeep bhatt', 'Saurashtra University,Rajkot', '9033348602', '2020-07-29', '12:13:00', 'pickup comment', 22.2908247, 70.7430321, 'Divyesh bhai', 'Jamnagar, Gujarat', '9601523556', '2020-07-29', '12:13:00', 'delivery comment for divyesh bhai', 'pending', NULL, 73.33, 94.57, 22.4707019, 70.05773, '2020-07-29 11:11:15', 1, '2020-07-29 11:11:15', 1, 32, NULL),
(39, 'Jaydeep bhatt', 'Nanavati Chowk, Rajkot', '9033348602', '2020-07-29', '12:26:00', 'comment for pickup', 22.3054267, 70.7684229, 'Receiver 3', 'The Grand Bhagvati, Kalawad road, Rajkot', '9615235689', '2020-07-29', '12:26:00', 'comment for delivery 3', 'pending', NULL, 6.14, 4.33, 22.2797787, 70.7155577, '2020-07-29 11:26:27', 1, '2020-07-29 11:26:27', 1, 33, NULL),
(40, 'Jaydeep bhatt', 'Nanavati Chowk, Rajkot', '9033348602', '2020-07-29', '12:26:00', 'comment for pickup', 22.3054267, 70.7684229, 'Receiver 1', 'Mavdi chowk, Rajkot', '9601523556', '2020-07-29', '12:26:00', 'comment for delivery 1', 'pending', NULL, 4.79, 4.79, 22.2648399, 70.7845993, '2020-07-29 11:26:27', 1, '2020-07-29 11:26:27', 1, 33, NULL),
(41, 'Jaydeep bhatt', 'Nanavati Chowk, Rajkot', '9033348602', '2020-07-29', '12:26:00', 'comment for pickup', 22.3054267, 70.7684229, 'Receiver 2', '302, Riwera wave, Kalawad road, Rajkot', '9696969696', '2020-07-29', '12:26:00', 'comment for delivery 2', 'pending', NULL, 3.77, 2.99, 22.273099, 70.7569494, '2020-07-29 11:26:27', 1, '2020-07-29 11:26:27', 1, 33, NULL),
(42, 'Jaydeep bhatt', '1,Rajkot', '9033348602', '2020-07-29', '12:39:00', NULL, 22.2766447, 70.8002773, '3', 'Rajkot 3', '6366666666', '2020-07-29', '12:39:00', NULL, 'pending', NULL, 2.46, 5.32, 22.2988381, 70.800813, '2020-07-29 11:35:28', 1, '2020-07-29 11:35:28', 1, 34, NULL),
(43, 'Jaydeep bhatt', '1,Rajkot', '9033348602', '2020-07-29', '12:39:00', NULL, 22.2766447, 70.8002773, '1', 'Rajkot 1', '9601523556', '2020-07-29', '12:39:00', NULL, 'pending', NULL, 5.59, 5.59, 22.3267874, 70.7937775, '2020-07-29 11:35:28', 1, '2020-07-29 11:35:28', 1, 34, NULL),
(44, 'Jaydeep bhatt', '1,Rajkot', '9033348602', '2020-07-29', '12:39:00', NULL, 22.2766447, 70.8002773, '2', 'Rajkot 2', '9898989898', '2020-07-29', '12:39:00', NULL, 'pending', NULL, 2.87, 8.46, 22.2507933, 70.80188, '2020-07-29 11:35:28', 1, '2020-07-29 11:35:28', 1, 34, NULL),
(45, 'Jaydeep bhatt', 'Rajkot', '9033348602', '2020-07-29', '12:50:00', NULL, 22.3038945, 70.8021599, 'Receiver 1', 'Rajkot 1', '9601523556', '2020-07-29', '12:50:00', NULL, 'pending', NULL, 2.68, 2.68, 22.3267874, 70.7937775, '2020-07-29 11:45:49', 1, '2020-07-29 11:45:49', 1, 35, NULL),
(46, 'Jaydeep bhatt', 'Rajkot', '9033348602', '2020-07-29', '12:50:00', NULL, 22.3038945, 70.8021599, 'Receiver 2', 'Rajkot 2', '9696999696', '2020-07-29', '12:50:00', NULL, 'pending', NULL, 5.88, 8.46, 22.2507933, 70.80188, '2020-07-29 11:45:49', 1, '2020-07-29 11:45:49', 1, 35, NULL),
(47, 'Jaydeep bhatt', 'Rajkot', '9033348602', '2020-07-29', '12:54:00', NULL, 22.3038945, 70.8021599, 'Receiver 3', 'Rajkot 3', '8588588585', '2020-07-29', '12:54:00', NULL, 'pending', NULL, 0.58, 3.03, 22.2988381, 70.800813, '2020-07-29 11:49:59', 1, '2020-07-29 11:49:59', 1, 36, NULL),
(48, 'Jaydeep bhatt', 'Rajkot', '9033348602', '2020-07-29', '12:54:00', NULL, 22.3038945, 70.8021599, 'Receiver 1', 'Rajkot', '9696999996', '2020-07-29', '12:54:00', NULL, 'pending', NULL, 0, 0, 22.3038945, 70.8021599, '2020-07-29 11:49:59', 1, '2020-07-29 11:49:59', 1, 36, NULL),
(49, 'Jaydeep bhatt', 'Rajkot', '9033348602', '2020-07-29', '12:54:00', NULL, 22.3038945, 70.8021599, 'Receiver 2', 'Rajkot 2', '9699999999', '2020-07-29', '12:54:00', NULL, 'pending', NULL, 3.31, 3.31, 22.2937378, 70.7719152, '2020-07-29 11:49:59', 1, '2020-07-29 11:49:59', 1, 36, NULL),
(50, 'Jaydeep bhatt', 'Rajkot', '9033348602', '2020-07-29', '13:00:00', NULL, 22.3038945, 70.8021599, 'R3', 'Rajkot 3', '9898696969', '2020-07-29', '13:00:00', NULL, 'pending', NULL, 0.58, 5.32, 22.2988381, 70.800813, '2020-07-29 12:02:38', 1, '2020-07-29 12:02:38', 1, 37, NULL),
(51, 'Jaydeep bhatt', 'Rajkot', '9033348602', '2020-07-29', '13:00:00', NULL, 22.3038945, 70.8021599, 'R4', 'Rajkot 4', '6565656555', '2020-07-29', '13:00:00', NULL, 'pending', NULL, 2.38, 1.84, 22.2824873, 70.8040305, '2020-07-29 12:02:38', 1, '2020-07-29 12:02:38', 1, 37, NULL),
(52, 'Jaydeep bhatt', 'Rajkot', '9033348602', '2020-07-29', '13:00:00', NULL, 22.3038945, 70.8021599, 'R1', 'Rajkot 1', '9696969699', '2020-07-29', '13:00:00', NULL, 'pending', NULL, 2.68, 2.68, 22.3267874, 70.7937775, '2020-07-29 12:02:38', 1, '2020-07-29 12:02:38', 1, 37, NULL),
(53, 'Jaydeep bhatt', 'Rajkot', '9033348602', '2020-07-29', '13:00:00', NULL, 22.3038945, 70.8021599, 'R2', 'Rajkot 2', '9898989098', '2020-07-29', '13:00:00', NULL, 'pending', NULL, 5.88, 8.46, 22.2507933, 70.80188, '2020-07-29 12:02:38', 1, '2020-07-29 12:02:38', 1, 37, NULL),
(54, 'Jaydeep bhatt', 'Rajkot', '9033348602', '2020-07-29', '13:23:00', NULL, 22.3038945, 70.8021599, 'R1', 'Rajkot 1', '9898989898', '2020-07-29', '13:23:00', NULL, 'pending', NULL, 2.68, 2.68, 22.3267874, 70.7937775, '2020-07-29 12:19:06', 1, '2020-07-29 12:19:06', 1, 38, NULL),
(55, 'Jaydeep bhatt', 'Rajkot', '9033348602', '2020-07-29', '13:23:00', NULL, 22.3038945, 70.8021599, 'R2', 'Rajkot 2', '2555555454', '2020-07-29', '13:23:00', NULL, 'pending', NULL, 3.31, 4.3, 22.2937378, 70.7719152, '2020-07-29 12:19:06', 1, '2020-07-29 12:19:06', 1, 38, NULL),
(56, 'Jaydeep bhatt', 'Rajkot', '9033348602', '2020-07-29', '13:23:00', NULL, 22.3038945, 70.8021599, 'R3', 'Rajkot 3', '2138467877', '2020-07-29', '13:23:00', NULL, 'pending', NULL, 0.58, 3.03, 22.2988381, 70.800813, '2020-07-29 12:19:06', 1, '2020-07-29 12:19:06', 1, 38, NULL),
(57, 'Jaydeep bhatt', 'Rajkot', '9033348602', '2020-07-29', '13:29:00', NULL, 22.3038945, 70.8021599, 'R1', 'Rajkot 1', '1111111111', '2020-07-29', '13:29:00', '111', 'pending', NULL, 2.68, 2.68, 22.3267874, 70.7937775, '2020-07-29 12:26:15', 1, '2020-07-29 12:26:15', 1, 39, NULL),
(58, 'Jaydeep bhatt', 'Rajkot', '9033348602', '2020-07-29', '13:29:00', NULL, 22.3038945, 70.8021599, 'R2', 'Rajkot 2', '2222222222', '2020-07-29', '13:29:00', '222', 'pending', NULL, 3.31, 4.3, 22.2937378, 70.7719152, '2020-07-29 12:26:15', 1, '2020-07-29 12:26:15', 1, 39, NULL),
(59, 'Jaydeep bhatt', 'Rajkot', '9033348602', '2020-07-29', '13:29:00', NULL, 22.3038945, 70.8021599, 'R3', 'Rajkot 3', '3333333333', '2020-07-29', '13:29:00', '333', 'pending', NULL, 0.58, 3.03, 22.2988381, 70.800813, '2020-07-29 12:26:15', 1, '2020-07-29 12:26:15', 1, 39, NULL),
(60, 'Jaydeep bhatt', 'Rajkot', '9033348602', '2020-07-29', '13:29:00', NULL, 22.3038945, 70.8021599, 'R4', 'Rajkot 4', '4444444444', '2020-07-29', '13:29:00', '444', 'pending', NULL, 2.38, 1.84, 22.2824873, 70.8040305, '2020-07-29 12:26:15', 1, '2020-07-29 12:26:15', 1, 39, NULL),
(61, 'Ravi prakashan,Indira circle, Rajkot', 'Ravi prakashan,Indira circle, Rajkot', '9033348602', '2020-07-29', '13:33:00', NULL, 0, 0, 'Jaydeep bhatt', 'Nanavati chowk, Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-29 12:28:26', 1, '2020-07-29 12:28:26', 1, 40, NULL),
(62, 'The Grand Thakar', 'Jawahar Rd, Opposite Jubilee Garden, Sadar, Rajkot, Gujarat 360001', '9033348602', '2020-07-29', '14:49:00', NULL, 0, 0, 'Jaydeep bhatt', 'Nanavati chowk, Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-29 13:43:44', 1, '2020-07-29 13:43:44', 1, 41, NULL),
(63, 'Pick N Pack', 'Sardar Nagar Main Rd, near poojara telecom, Sardarnagar, Rajkot, Gujarat 360001', '9033348602', '2020-07-29', '14:50:00', NULL, 0, 0, 'Jaydeep bhatt', 'Shastri medan, Limda chowk, Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-29 13:45:07', 1, '2020-07-29 13:45:07', 1, 42, NULL),
(64, 'Jaydeep bhatt', 'Nanavati chowk,150 ft Ring road,Rajkot', '9033348602', '2020-07-29', '15:11:00', 'pickup comment', 22.3053961, 70.7683508, 'Divyesh bhai', 'Mavdi chowkdi, 150 Ft Ring road, Rajkot', '1111111111', '2020-07-29', '15:11:00', 'Comment 1', 'pending', NULL, 5.04, 5.04, 22.2629378, 70.7859067, '2020-07-29 14:09:25', 1, '2020-07-29 14:09:25', 1, 43, NULL),
(65, 'Jaydeep bhatt', 'Nanavati chowk,150 ft Ring road,Rajkot', '9033348602', '2020-07-29', '15:11:00', 'pickup comment', 22.3053961, 70.7683508, 'Keval bhai', 'Jamnagar road, madhapar chowkdi, Rajkot', '2222222222', '2020-07-29', '15:11:00', 'comment 2', 'pending', NULL, 2.59, 7.49, 22.328736, 70.769151, '2020-07-29 14:09:25', 1, '2020-07-29 14:09:25', 1, 43, NULL),
(66, 'Jaydeep bhatt', 'Nanavati chowk,150 ft Ring road,Rajkot', '9033348602', '2020-07-29', '15:11:00', 'pickup comment', 22.3053961, 70.7683508, 'Rajendra bapu', 'Morbi', '3333333333', '2020-07-29', '15:11:00', 'comment 3', 'pending', NULL, 58.16, 55.59, 22.8251874, 70.8490809, '2020-07-29 14:09:25', 1, '2020-07-29 14:09:25', 1, 43, NULL),
(67, 'Jaydeep bhatt', 'Nanavati chowk,150 ft Ring road,Rajkot', '9033348602', '2020-07-29', '15:11:00', 'pickup comment', 22.3053961, 70.7683508, 'Jagdish bhai', '302, Riwera wave, Kalawad road, Rajkot', '4444444444', '1970-01-01', '15:20:00', 'comment 4', 'pending', NULL, 3.76, 61.87, 22.273099, 70.7569494, '2020-07-29 14:09:25', 1, '2020-07-29 14:09:25', 1, 43, NULL),
(68, 'Jaydeep bhatt', 'Paddhari', '9033348602', '2020-07-29', '15:16:00', NULL, 22.4354368, 70.6008723, 'Parth bhai', 'Rajkot', '1111111111', '2020-07-29', '15:16:00', NULL, 'pending', NULL, 25.34, 25.34, 22.3038945, 70.8021599, '2020-07-29 14:11:05', 1, '2020-07-29 14:11:05', 1, 44, NULL),
(69, 'The Grand Thakar', 'Jawahar Rd, Opposite Jubilee Garden, Sadar, Rajkot, Gujarat 360001', '9033348602', '2020-07-29', '15:17:00', NULL, 0, 0, 'Jaydeep bhatt', 'Morbi', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-29 14:11:59', 1, '2020-07-29 14:11:59', 1, 45, NULL),
(70, 'Reliance Mall', 'Plot No 2/A, Survey No 30, 150 Feet Ring Rd, Opposite Big Bazaar, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-07-29', '15:18:00', NULL, 0, 0, 'Jaydeep bhatt', 'Kalawad road, rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-29 14:13:00', 1, '2020-07-29 14:13:00', 1, 46, NULL),
(71, 'Jaydeep bhatt', 'Rajkot', '9033348602', '2020-07-29', '15:34:00', NULL, 22.3038945, 70.8021599, 'Niraj', 'Jetpur', '1111111111', '2020-07-29', '15:34:00', NULL, 'pending', NULL, 63.72, 63.72, 21.7546665, 70.6179777, '2020-07-29 14:30:22', 1, '2020-07-29 14:30:22', 1, 47, NULL),
(72, 'Jaydeep bhatt', 'Rajkot', '9033348602', '2020-07-29', '15:34:00', NULL, 22.3038945, 70.8021599, 'Parth', 'Morbi', '2222222222', '2020-07-29', '15:34:00', NULL, 'pending', NULL, 57.93, 120.91, 22.8251874, 70.8490809, '2020-07-29 14:30:22', 1, '2020-07-29 14:30:22', 1, 47, NULL),
(73, 'Jaydeep bhatt', 'Rajkot', '9033348602', '2020-07-29', '15:34:00', NULL, 22.3038945, 70.8021599, 'Ravi', 'Junagadh', '3333333333', '2020-07-29', '15:34:00', NULL, 'pending', NULL, 93.58, 149.81, 21.5222203, 70.4579436, '2020-07-29 14:30:22', 1, '2020-07-29 14:30:22', 1, 47, NULL),
(74, 'Jaydeep bhatt', 'Rajkot', '9033348602', '2020-07-29', '15:34:00', NULL, 22.3038945, 70.8021599, 'Keval', 'Jamnagar', '4444444444', '2020-07-29', '15:34:00', NULL, 'pending', NULL, 78.85, 112.86, 22.4707019, 70.05773, '2020-07-29 14:30:22', 1, '2020-07-29 14:30:22', 1, 47, NULL),
(75, 'Jaydeep Bhatt', 'Rajkot', '9033348602', '2020-07-29', '17:01:00', NULL, 22.3038945, 70.8021599, 'Divyesh bhai', 'Rajkot 1', '7016697110', '2020-07-29', '17:01:00', NULL, 'pending', NULL, 2.68, 2.68, 22.3267874, 70.7937775, '2020-07-29 15:56:50', 1, '2020-07-29 15:56:50', 1, 48, NULL),
(76, 'adtreddt', 'adtreddt', '7016811691', '2020-07-29', '16:57:00', NULL, 0, 0, 'hitesh', 'stre', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-29 15:58:42', 1, '2020-07-29 15:58:42', 1, 49, NULL),
(77, 'Jaydeep Bhatt', 'Rajkot', '9033348602', '2020-07-29', '17:03:00', NULL, 22.3038945, 70.8021599, 'Divyesh bhai. 234', 'Rajkot2', '7016697110', '2020-07-29', '17:03:00', NULL, 'pending', NULL, 3.31, 3.31, 22.2937378, 70.7719152, '2020-07-29 15:58:47', 1, '2020-07-29 15:58:47', 1, 50, NULL),
(78, 'Rajkot', 'Rajkot', '9033348602', '2020-07-29', '17:07:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Rajkot 12', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-29 16:02:27', 1, '2020-07-29 16:02:27', 1, 51, NULL),
(79, 'addresdff', 'addresdff', '7019811666', '2020-07-29', '17:04:00', NULL, 0, 0, 'hitesh', 'store', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-29 16:04:47', 1, '2020-07-29 16:04:47', 1, 52, NULL),
(80, 'Reliance Mall', 'Plot No 2/A, Survey No 30, 150 Feet Ring Rd, Opposite Big Bazaar, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-07-29', '17:10:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-29 16:04:59', 1, '2020-07-29 16:04:59', 1, 53, NULL),
(81, 'Rajkot', 'Rajkot', '9033348603', '2020-07-29', '17:11:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-29 16:06:25', 1, '2020-07-29 16:06:25', 1, 54, NULL),
(82, 'Rajkot', 'Rajkot', '9033348603', '2020-07-29', '17:33:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-29 16:28:23', 1, '2020-07-29 16:28:23', 1, 55, NULL),
(83, 'Rajkot', 'Rajkot', '9033348603', '2020-07-29', '17:40:00', NULL, 0, 0, 'Jaydeep without login', 'Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-29 16:34:50', 1, '2020-07-29 16:34:50', 1, 56, NULL),
(84, 'Rajkot', 'Rajkot', '9033348602', '2020-07-29', '17:42:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-29 16:37:31', 1, '2020-07-29 16:37:31', 1, 57, NULL),
(85, 'Rajkot', 'Rajkot', '7016697110', '2020-07-29', '17:48:00', NULL, 0, 0, 'Mohammad bhai', 'Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-29 16:43:40', 1, '2020-07-29 16:43:40', 1, 60, NULL),
(86, 'Rajkot', 'Rajkot', '7016697110', '2020-07-29', '17:43:00', NULL, 0, 0, 'Jaydeep Bhatt without login', 'Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-29 16:46:19', 1, '2020-07-29 16:46:19', 1, 61, NULL),
(87, 'Rajkot', 'Rajkot', '7016697110', '2020-07-29', '17:43:00', NULL, 0, 0, 'Jaydeep Bhatt without login', 'Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-29 16:48:59', 1, '2020-07-29 16:48:59', 1, 62, NULL),
(88, 'Rajkot', 'Rajkot', '7016697110', '2020-07-29', '17:43:00', NULL, 0, 0, 'Jaydeep Bhatt without login', 'Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-29 16:51:16', 1, '2020-07-29 16:51:16', 1, 63, NULL),
(89, 'Rajkot', 'Rajkot', '7016697110', '2020-07-29', '17:43:00', NULL, 0, 0, 'Jaydeep Bhatt without login', 'Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-29 16:53:12', 1, '2020-07-29 16:53:12', 1, 64, NULL),
(90, 'Rajkot', 'Rajkot', '9033348602', '2020-07-29', '18:01:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-29 16:56:10', 1, '2020-07-29 16:56:10', 1, 65, NULL),
(91, 'Rajkot', 'Rajkot', '7016697110', '2020-07-29', '18:02:00', NULL, 0, 0, 'Jaydeep Bhatt another', 'Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-29 16:57:25', 1, '2020-07-29 16:57:25', 1, 66, NULL),
(92, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '7016697110', '2020-07-29', '18:04:00', NULL, 0, 0, 'Jaydeep Bhatt anotjer', 'Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-29 16:59:02', 1, '2020-07-29 16:59:02', 1, 67, NULL),
(93, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-07-29', '18:06:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-29 17:00:38', 1, '2020-07-29 17:00:38', 1, 68, NULL),
(94, 'The Grand Thakar', 'Jawahar Rd, Opposite Jubilee Garden, Sadar, Rajkot, Gujarat 360001', '7016697110', '2020-07-29', '18:07:00', NULL, 0, 0, 'Jaydeep Bhatt another', 'Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-29 17:02:04', 1, '2020-07-29 17:02:04', 1, 69, NULL),
(95, 'Jaydeep Bhatt another', 'Rajkot', '7016697110', '2020-07-30', '07:45:00', NULL, 22.3038945, 70.8021599, 'Divyesh bhai', 'Rajkot 1', '9033348602', '2020-07-30', '07:45:00', NULL, 'pending', NULL, 2.68, 2.68, 22.3267874, 70.7937775, '2020-07-30 06:41:58', 1, '2020-07-30 06:41:58', 1, 70, NULL),
(96, 'Jaydeep Bhatt another', 'Rajkot', '7016697110', '2020-07-30', '07:45:00', NULL, 22.3038945, 70.8021599, 'Receiver 2', 'Rajkot 2', '9033348602', '2020-07-30', '07:45:00', NULL, 'pending', NULL, 3.31, 4.3, 22.2937378, 70.7719152, '2020-07-30 06:41:58', 1, '2020-07-30 06:41:58', 1, 70, NULL),
(97, 'Jaydeep Bhatt', 'Nanavati chowk,150 ft Ring road, Rajkot', '9033348602', '2020-07-30', '13:07:00', NULL, 22.3053961, 70.7683508, 'Divyesh bhai', 'Mavdi chowkdi, 150 ft Ring road, Rajkot', '7016697110', '2020-07-30', '13:07:00', NULL, 'pending', NULL, 5.04, 5.04, 22.2629378, 70.7859067, '2020-07-30 12:03:54', 1, '2020-07-30 12:03:54', 1, 71, NULL),
(98, 'Jaydeep Bhatt', 'Nanavati chowk,150 ft Ring road, Rajkot', '9033348602', '2020-07-30', '13:07:00', NULL, 22.3053961, 70.7683508, 'Jagdish bhai', 'Om Nagar, 150 ft Ring road, Rajkot', '9601523556', '2020-07-30', '13:07:00', NULL, 'pending', NULL, 1.71, 3.38, 22.2901051, 70.7709785, '2020-07-30 12:03:54', 1, '2020-07-30 12:03:54', 1, 71, NULL),
(99, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-07-30', '13:10:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Nanavati chowk, 150 ft Ring road, Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-30 12:05:22', 1, '2020-07-30 12:05:22', 1, 72, NULL),
(100, 'Reliance Mall', 'Plot No 2/A, Survey No 30, 150 Feet Ring Rd, Opposite Big Bazaar, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-07-30', '13:11:00', NULL, 0, 0, 'Jaydeep Bhatt', 'K.K.V hall, 150 ft Ring road, Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-30 12:06:31', 1, '2020-07-30 12:06:31', 1, 73, NULL),
(101, 'Riwera wave, Kalawad road, Rajkot', 'Riwera wave, Kalawad road, Rajkot', '9033348602', '2020-07-30', '13:12:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Nanavati chowk, Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-30 12:08:09', 1, '2020-07-30 12:08:09', 1, 74, NULL),
(102, 'Divyesh', 'skjdla', '7016697110', '2020-06-29', '03:00:00', 'dfgdfgdfdfgdf', 1, 1, 'Ramubhai', '132', '5555', '1970-01-01', '05:30:00', '0', 'pending', NULL, 0, 0, 0, 0, '2020-07-30 14:29:49', 1, '2020-07-30 14:29:49', 1, 75, NULL),
(103, 'Divyesh', 'skjdla', '7016697110', '2020-06-29', '03:00:00', 'dfgdfgdfdfgdf', 1, 1, 'Ramubhai', '132', '5555', '1970-01-01', '05:30:00', '5456456', 'pending', NULL, 0, 0, 0, 0, '2020-07-30 14:29:49', 1, '2020-07-30 14:29:49', 1, 75, NULL),
(104, 'Divyesh', 'skjdla', '7016697110', '2020-06-29', '03:00:00', 'dfgdfgdfdfgdf', 1, 1, 'Ramubhai', '132', '5555', '1970-01-01', '05:30:00', '5456456', 'pending', NULL, 0, 0, 0, 0, '2020-07-30 14:29:49', 1, '2020-07-30 14:29:49', 1, 75, NULL),
(105, 'Divyesh', 'skjdla', '7016697110', '2020-06-29', '03:00:00', 'dfgdfgdfdfgdf', 1, 1, 'Ramubhai', '132', '5555', '1970-01-01', '05:30:00', '5456456', 'pending', NULL, 0, 0, 0, 0, '2020-07-30 14:29:49', 1, '2020-07-30 14:29:49', 1, 75, NULL),
(106, 'Jaydeep Bhatt', 'Nanavati chowk,150 ft Ring road, Rajkot', '9033348602', '2020-07-30', '15:44:00', NULL, 22.3053961, 70.7683508, 'Jagdish bhai', 'Mavdi chowkdi, 150 ft Ring road, Rajkot', '9601523556', '2020-07-30', '15:44:00', NULL, 'pending', NULL, 5.04, 5.04, 22.2629378, 70.7859067, '2020-07-30 14:40:03', 1, '2020-07-30 14:40:03', 1, 76, NULL),
(107, 'Jaydeep Bhatt', 'Nanavati chowk,150 ft Ring road, Rajkot', '9033348602', '2020-07-30', '15:44:00', NULL, 22.3053961, 70.7683508, 'Jayanti bhai', 'Mavdi chowkdi, 150 ft Ring road, Rajkot', '9601523556', '2020-07-30', '15:44:00', NULL, 'pending', NULL, 5.04, 0, 22.2629378, 70.7859067, '2020-07-30 14:40:03', 1, '2020-07-30 14:40:03', 1, 76, NULL),
(108, 'The Grand Thakar', 'Jawahar Rd, Opposite Jubilee Garden, Sadar, Rajkot, Gujarat 360001', '9825998125', '2020-07-30', '17:25:00', NULL, 0, 0, 'hitesh', 'rivera wave, kalawad road', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-30 16:26:39', 1, '2020-07-30 16:26:39', 1, 77, NULL),
(109, 'D Mart', 'Kuvadava Rd, near Green Land Circle, Navagam, Rajkot, Gujarat 360003', '7016811691', '2020-07-30', '17:32:00', NULL, 0, 0, 'webz', 'university rosd, rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-30 16:33:31', 1, '2020-07-30 16:33:31', 1, 78, NULL),
(110, 'kalawad road, rajkot', 'kalawad road, rajkot', '7016811691', '2020-07-30', '17:34:00', NULL, 0, 0, 'hitesh', 'gondal road,  rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-30 16:35:17', 1, '2020-07-30 16:35:17', 1, 79, NULL),
(111, 'D Mart', 'Crystal Mall L-B1 Kalavad Road Opp. Rani Tower, Sadguru Nagar, Rajkot, Gujarat 360005', '9327647270', '2020-07-30', '21:04:00', NULL, 0, 0, 'test', 'test', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-30 20:06:01', 1, '2020-07-30 20:06:01', 1, 80, NULL),
(112, 'test', 'test', '9327647270', '2020-07-30', '21:24:00', NULL, 0, 0, 'test', 'Chandan', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-30 20:25:38', 1, '2020-07-30 20:25:38', 1, 81, NULL),
(113, 'pizza', 'pizza', '9327647270', '2020-07-30', '21:25:00', NULL, 0, 0, 'test', 'test', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-30 20:26:35', 1, '2020-07-30 20:26:35', 1, 82, NULL),
(114, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-07-31', '10:11:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Nanavati chowk, Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-31 09:17:20', 1, '2020-07-31 09:17:20', 1, 83, NULL),
(115, 'McDonald\'s', 'Ground 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-07-31', '10:11:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Nanavati chowk, Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-31 09:17:27', 1, '2020-07-31 09:17:27', 1, 84, NULL),
(116, 'Jaydeep Bhatt', 'Radheshyam park, Rajkot', '9033348602', '2020-07-31', '11:33:00', NULL, 22.2404443, 70.8135318, 'Divyesh bhai', 'Government colony, Rajkot', '7016697110', '2020-07-31', '11:33:00', NULL, 'pending', NULL, 8.2, 8.2, 22.2992916, 70.7651669, '2020-07-31 10:28:49', 1, '2020-07-31 10:28:49', 1, 85, NULL),
(117, 'hitesh', 'radheshyam park, kothariya main road, rajkot', '9825998125', '2020-08-06', '07:55:00', NULL, 22.2401315, 70.8123502, 'avc', 'chitrakutdham society,  street no 5, kuvadva road, rajkot', '6980896580', '2020-08-06', '19:45:00', NULL, 'pending', NULL, 9.14, 9.14, 22.3191377, 70.8379044, '2020-07-31 10:46:44', 1, '2020-07-31 10:46:44', 1, 86, NULL),
(118, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-07-31', '13:41:00', NULL, 22.2729455, 70.7565578, 'Jagdish bhai', 'Nanavati chowk, Rajkot', '9879944744', '2020-07-31', '13:41:00', NULL, 'pending', NULL, 3.8, 3.8, 22.3054267, 70.7684229, '2020-07-31 12:37:25', 1, '2020-07-31 12:37:25', 1, 87, NULL),
(119, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-07-31', '13:50:00', NULL, 22.2729455, 70.7565578, 'Jagdish', 'Nanavati chowk, Rajkot', '9879944744', '2020-07-31', '13:50:00', NULL, 'pending', NULL, 3.8, 3.8, 22.3054267, 70.7684229, '2020-07-31 12:45:15', 1, '2020-07-31 12:45:15', 1, 88, NULL),
(120, 'Reliance Mall', 'Plot No 2/A, Survey No 30, 150 Feet Ring Rd, Opposite Big Bazaar, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-07-31', '14:32:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Nana mava main road, Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-31 13:27:22', 1, '2020-07-31 13:27:22', 1, 89, NULL),
(121, 'Rajkot', 'Rajkot', '9033348602', '2020-07-31', '15:23:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-31 14:18:11', 1, '2020-07-31 14:18:11', 1, 90, NULL),
(122, 'McDonald\'s', 'Ground 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-07-31', '10:11:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Nanavati chowk, Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-31 15:56:17', 1, '2020-07-31 15:56:17', 1, 91, NULL),
(123, 'Natural Veggies', '224-225, Jimmy Tower, Opp Swami Narayan Gurukul,, Gondal Rd, Bhakti Nagar, Rajkot, Gujarat 360002', '9033348602', '2020-07-31', '17:42:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Nanavati chowk, Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-07-31 16:36:51', 1, '2020-07-31 16:36:51', 1, 92, NULL),
(124, 'Jaydeep Bhatt', 'Nanavati chowk, Rajkot', '9033348602', '2020-07-31', '17:44:00', NULL, 22.3054267, 70.7684229, 'Arvind bhai', 'mavdi main road, Rajkot', '9879944744', '2020-07-31', '17:44:00', NULL, 'pending', NULL, 8.16, 8.16, 22.2318143, 70.7643116, '2020-07-31 16:40:23', 1, '2020-07-31 16:40:23', 1, 93, NULL),
(125, 'Divyesh', 'skjdla', '7016697110', '2020-06-29', '03:00:00', 'dfgdfgdfdfgdf', 1, 1, 'Ramubhai', '132', '5555', '2020-06-29', '05:30:00', '0', 'pending', NULL, 0, 0, 0, 0, '2020-07-31 16:51:35', 1, '2020-07-31 16:51:35', 1, 94, NULL),
(126, 'Divyesh', 'skjdla', '7016697110', '2020-06-29', '03:00:00', 'dfgdfgdfdfgdf', 1, 1, 'Ramubhai', '132', '5555', '2020-06-29', '05:30:00', '5456456', 'pending', NULL, 0, 0, 0, 0, '2020-07-31 16:51:35', 1, '2020-07-31 16:51:35', 1, 94, NULL),
(127, 'Divyesh', 'skjdla', '7016697110', '2020-06-29', '03:00:00', 'dfgdfgdfdfgdf', 1, 1, 'Ramubhai', '132', '5555', '2020-06-29', '05:30:00', '5456456', 'pending', NULL, 0, 0, 0, 0, '2020-07-31 16:51:35', 1, '2020-07-31 16:51:35', 1, 94, NULL),
(128, 'Divyesh', 'skjdla', '7016697110', '2020-06-29', '03:00:00', 'dfgdfgdfdfgdf', 1, 1, 'Ramubhai', '132', '5555', '2020-06-29', '05:30:00', '5456456', 'pending', NULL, 0, 0, 0, 0, '2020-07-31 16:51:35', 1, '2020-07-31 16:51:35', 1, 94, NULL),
(129, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-01', '09:39:00', NULL, 22.2729455, 70.7565578, 'Digu bhai', 'mavdi main road, Rajkot', '9879944744', '2020-08-01', '09:39:00', NULL, 'pending', NULL, 4.62, 4.62, 22.2318143, 70.7643116, '2020-08-01 08:34:42', 1, '2020-08-01 08:34:42', 1, 95, NULL),
(130, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-01', '09:48:00', NULL, 0, 0, 'Jaydeep Bhatt', 'mavdi main road, Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-01 08:42:48', 1, '2020-08-01 08:42:48', 1, 96, NULL),
(131, 'D Mart', 'Kuvadava Rd, near Green Land Circle, Navagam, Rajkot, Gujarat 360003', '9033348602', '2020-08-01', '09:52:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-01 08:46:59', 1, '2020-08-01 08:46:59', 1, 97, NULL),
(132, 'Jaydeep Bhatt', 'Kuvadava Rd, near Green Land Circle, Navagam, Rajkot, Gujarat 360003', '9033348602', '2020-08-01', '09:54:00', NULL, 22.3150009, 70.840182, 'Dipak bhai', 'Nanavati chowk, Rajkot', '9879944744', '2020-08-01', '09:54:00', NULL, 'pending', NULL, 7.47, 7.47, 22.3054267, 70.7684229, '2020-08-01 08:48:50', 1, '2020-08-01 08:48:50', 1, 98, NULL),
(133, NULL, '123', '7016697110', '1970-01-01', '05:30:00', NULL, 0, 0, NULL, '1563', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-01 09:02:00', 1, '2020-08-01 09:02:00', 1, 99, NULL),
(134, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-01', '10:08:00', NULL, 0, 0, 'Jaydeep Bhatt', 'mavdi chowkdi, Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-01 09:02:52', 1, '2020-08-01 09:02:52', 1, 100, NULL),
(135, 'Nanavati chowk, Rajkot', 'Nanavati chowk, Rajkot', '9033348602', '2020-08-01', '10:08:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Mavdi chowk, Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-01 09:03:32', 1, '2020-08-01 09:03:32', 1, 101, NULL),
(136, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-01', '10:09:00', NULL, 22.2729455, 70.7565578, 'Divyesh bhai', 'mavdi chowkdi, Rajkot', '9879944744', '2020-08-01', '10:09:00', NULL, 'pending', NULL, 3.25, 3.25, 22.2629975, 70.7862588, '2020-08-01 09:04:50', 1, '2020-08-01 09:04:50', 1, 102, NULL),
(137, 'hitesh', 'Jawahar Rd, Opposite Jubilee Garden, Sadar, Rajkot, Gujarat 360001', '9825998125', '2020-08-01', '11:29:00', NULL, 22.2991231, 70.8013104, 'tet', 'chitrakutdham society,  street no 5, kuvadva road, rajkot', '1345784944', '2020-08-01', '20:25:00', NULL, 'pending', NULL, 4.37, 4.37, 22.3191377, 70.8379044, '2020-08-01 10:30:19', 1, '2020-08-01 10:30:19', 1, 103, NULL),
(138, 'hitesh', 'Jawahar Rd, Opposite Jubilee Garden, Sadar, Rajkot, Gujarat 360001', '9825998125', '2020-08-01', '11:29:00', NULL, 22.2991231, 70.8013104, 'tet', 'chitrakutdham society,  street no 5, kuvadva road, rajkot', '1345784944', '2020-08-01', '20:25:00', NULL, 'pending', NULL, 4.37, 4.37, 22.3191377, 70.8379044, '2020-08-01 10:30:20', 1, '2020-08-01 10:30:20', 1, 104, NULL),
(139, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-01', '11:44:00', NULL, 22.2729455, 70.7565578, 'Divyesh', 'mavdi chowkdi, Rajkot', '9879944744', '2020-08-01', '11:44:00', NULL, 'pending', NULL, 3.25, 3.25, 22.2629975, 70.7862588, '2020-08-01 10:39:09', 1, '2020-08-01 10:39:09', 1, 105, NULL),
(140, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-01', '12:03:00', NULL, 22.2729455, 70.7565578, 'Divyesh bapu', 'mavdi chowkdi, Rajkot', '9879944744', '2020-08-01', '12:03:00', NULL, 'pending', NULL, 3.25, 3.25, 22.2629975, 70.7862588, '2020-08-01 10:57:56', 1, '2020-08-01 10:57:56', 1, 106, NULL),
(141, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-10', '12:03:00', NULL, 22.2729455, 70.7565578, 'Bapu', 'mavdi chowkdi, Rajkot', '9879944744', '2020-08-10', '12:03:00', NULL, 'pending', NULL, 3.25, 3.25, 22.2629975, 70.7862588, '2020-08-01 10:59:04', 1, '2020-08-01 10:59:04', 1, 107, NULL),
(142, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-10', '12:05:00', NULL, 22.2729455, 70.7565578, 'divyesh bapu', 'mavdi chowkdi, Rajkot', '9879944744', '2020-08-11', '12:05:00', NULL, 'pending', NULL, 3.25, 3.25, 22.2629975, 70.7862588, '2020-08-01 11:00:53', 1, '2020-08-01 11:00:53', 1, 108, NULL),
(143, 'hitesh', 'Jawahar Rd, Opposite Jubilee Garden, Sadar, Rajkot, Gujarat 360001', '9825998125', '2020-08-01', '12:05:00', NULL, 22.2991231, 70.8013104, 'test', 'chitrakutdham society,  street no 5, kuvadva road, rajkot', '4646464646', '2020-08-01', '12:05:00', NULL, 'pending', NULL, 4.37, 4.37, 22.3191377, 70.8379044, '2020-08-01 11:06:39', 1, '2020-08-01 11:06:39', 1, 109, NULL),
(144, 'Ultra fresh', 'ULTRA FRESH OPP.SATYSAI HOSPITEL,SATYSAI MAIN ROAD, Rajkot, Gujarat 360005', '9825998125', '2020-08-01', '12:07:00', NULL, 0, 0, 'hitesh', 'chitrakutdham society,  street no 5, kuvadva road, rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-01 11:07:41', 1, '2020-08-01 11:07:41', 1, 110, NULL),
(145, 'Ultra fresh', 'ULTRA FRESH OPP.SATYSAI HOSPITEL,SATYSAI MAIN ROAD, Rajkot, Gujarat 360005', '7016811691', '2020-08-01', '12:08:00', NULL, 0, 0, 'hitesh', 'rivera wave, kalawad road', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-01 11:09:37', 1, '2020-08-01 11:09:37', 1, 111, NULL),
(146, 'Shakti Veg Shop', 'Raj Palace Opp. Nakshatra-5, Sadhu Vaswani Road, Yogi Nagar, Rajkot, Gujarat 360005', '9825998125', '2020-08-01', '12:48:00', NULL, 0, 0, 'hitesh', 'rivera wave, kalawad road', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-01 11:48:59', 1, '2020-08-01 11:48:59', 1, 112, NULL),
(147, 'kalawad road, rajkot', 'kalawad road, rajkot', '9825998125', '2020-08-01', '12:49:00', NULL, 0, 0, 'hitesh', 'chitrakutdham society,  street no 5, kuvadva road, rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-01 11:50:04', 1, '2020-08-01 11:50:04', 1, 113, NULL),
(148, 'hitesh', 'university road, rajkot', '9825998125', '2020-08-01', '17:50:00', NULL, 22.2876452, 70.7622956, 'test', 'Rivera wave, kalawad road,  rajkot', '1548794653', '2020-08-01', '08:45:00', NULL, 'pending', NULL, 1.71, 1.71, 22.2730401, 70.7569436, '2020-08-01 11:53:36', 1, '2020-08-01 11:53:36', 1, 114, NULL),
(149, 'hitesh', 'university road, rajkot', '9825998125', '2020-08-01', '18:55:00', NULL, 22.2876452, 70.7622956, 'abc', 'Rivera wave, kalawad road, rajkot', '4679487545', '2020-08-01', '08:45:00', NULL, 'pending', NULL, 1.71, 1.71, 22.2730401, 70.7569436, '2020-08-01 11:55:56', 1, '2020-08-01 11:55:56', 1, 115, NULL),
(150, 'hitesh', 'indira circle, university road', '9825998125', '2020-08-01', '13:10:00', NULL, 22.2884446, 70.7708708, 'aarav', 'kalawad road', '4679467545', '2020-08-01', '17:10:00', NULL, 'pending', NULL, 20.66, 20.66, 22.2125008, 70.5877967, '2020-08-01 12:11:09', 1, '2020-08-01 12:11:09', 1, 116, NULL),
(151, 'hitesh', 'university road, rajkot', '9825998125', '2020-08-01', '13:11:00', NULL, 22.2876452, 70.7622956, 'abc', 'kalawad road', '4679467646', '2020-08-01', '13:11:00', NULL, 'pending', NULL, 19.82, 19.82, 22.2125008, 70.5877967, '2020-08-01 12:14:00', 1, '2020-08-01 12:14:00', 1, 117, NULL),
(152, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-01', '13:24:00', NULL, 22.2729455, 70.7565578, 'nsnsj', 'mavdi chowkdi, Rajkot', '9879944744', '2020-08-01', '13:24:00', NULL, 'pending', NULL, 3.25, 3.25, 22.2629975, 70.7862588, '2020-08-01 12:19:52', 1, '2020-08-01 12:19:52', 1, 118, NULL),
(153, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-01', '13:24:00', NULL, 22.2729455, 70.7565578, 'ndndn', 'Nanavati chowk, Rajkot', '9879623556', '2020-08-01', '13:24:00', NULL, 'pending', NULL, 3.8, 5.05, 22.3054267, 70.7684229, '2020-08-01 12:19:52', 1, '2020-08-01 12:19:52', 1, 118, NULL),
(154, 'hitesh', 'garden villa, sadhuvasvani road, nr raiya road, rajkot', '9825998125', '2020-08-01', '13:23:00', 'abc test', 22.2939632, 70.7589004, 'ab', 'Rivera wave, kalawad road,  rajkot', '4675487946', '2020-08-01', '13:23:00', 'rwys', 'pending', NULL, 2.33, 2.33, 22.2730401, 70.7569436, '2020-08-01 12:24:54', 1, '2020-08-01 12:24:54', 1, 119, NULL),
(155, 'hitesh', 'garden villa, sadhuvasvani road, nr raiya road, rajkot', '9825998125', '2020-08-01', '13:23:00', 'abc test', 22.2939632, 70.7589004, 'ab', 'Rivera wave, kalawad road,  rajkot', '4675487946', '2020-08-01', '13:23:00', 'rwys', 'pending', NULL, 2.33, 2.33, 22.2730401, 70.7569436, '2020-08-01 12:24:54', 1, '2020-08-01 12:24:54', 1, 120, NULL),
(156, 'My store', 'My store', '0108202004', '2020-08-01', '13:28:00', NULL, 0, 0, 'Hitesh', 'test2', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-01 12:29:49', 1, '2020-08-01 12:29:49', 1, 121, NULL),
(157, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-01', '13:34:00', NULL, 22.2729455, 70.7565578, 'hshdj', 'mavdi chowkdi, Rajkot', '9879944744', '2020-08-01', '13:34:00', NULL, 'pending', NULL, 3.25, 3.25, 22.2629975, 70.7862588, '2020-08-01 12:29:52', 1, '2020-08-01 12:29:52', 1, 122, NULL),
(158, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-01', '13:34:00', NULL, 22.2729455, 70.7565578, 'xhdh', 'Nanavati chowk, Rajkot', '9879944623', '2020-08-01', '13:34:00', NULL, 'pending', NULL, 3.8, 5.05, 22.3054267, 70.7684229, '2020-08-01 12:29:52', 1, '2020-08-01 12:29:52', 1, 122, NULL),
(159, 'mc donald', 'mc donald', '0108202004', '2020-08-01', '13:29:00', NULL, 0, 0, 'Hitesh', 'test', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-01 12:31:08', 1, '2020-08-01 12:31:08', 1, 123, NULL),
(160, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-01', '13:35:00', NULL, 22.2729455, 70.7565578, 'ndndn', 'Nanavati chowk, Rajkot', '9033348602', '2020-08-01', '13:35:00', NULL, 'pending', NULL, 3.8, 3.8, 22.3054267, 70.7684229, '2020-08-01 12:31:38', 1, '2020-08-01 12:31:38', 1, 124, NULL);
INSERT INTO `order_address` (`id`, `sender_name`, `pickup_address`, `pickup_phone`, `pickup_date`, `pickup_time`, `pickup_comment`, `pickup_lat`, `pickup_long`, `delivery_receiver_name`, `delivery_address`, `delivery_phone`, `delivery_date`, `delivery_time`, `delivery_comment`, `delivery_status`, `delivery_status_reason`, `pickup_distance`, `delivery_distance`, `delivery_lat`, `delivery_long`, `created_at`, `created_by`, `updated_at`, `updated_by`, `double_google_order_id`, `payment_status_id`) VALUES
(161, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-01', '13:35:00', NULL, 22.2729455, 70.7565578, 'bxbxhhx', 'Nanavati chowk, Rajkot', '9879944744', '2020-08-01', '13:35:00', NULL, 'pending', NULL, 3.8, 0, 22.3054267, 70.7684229, '2020-08-01 12:31:38', 1, '2020-08-01 12:31:38', 1, 124, NULL),
(162, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-01', '13:35:00', NULL, 22.2729455, 70.7565578, 'hdjdjd', 'Nanavati chowk, Rajkot', '9879952525', '2020-08-01', '13:35:00', NULL, 'pending', NULL, 3.8, 0, 22.3054267, 70.7684229, '2020-08-01 12:31:38', 1, '2020-08-01 12:31:38', 1, 124, NULL),
(163, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-01', '13:41:00', NULL, 22.2729455, 70.7565578, 'bxhxh', 'Nanavati chowk, Rajkot', '9033348602', '2020-08-01', '13:41:00', NULL, 'pending', NULL, 3.8, 3.8, 22.3054267, 70.7684229, '2020-08-01 12:36:40', 1, '2020-08-01 12:36:40', 1, 125, NULL),
(164, 'chandan', 'chandan', '0108202004', '2020-08-01', '13:31:00', NULL, 0, 0, 'Hitesh', 'test2', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-01 12:37:39', 1, '2020-08-01 12:37:39', 1, 126, NULL),
(165, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-01', '13:42:00', NULL, 22.2729455, 70.7565578, 'jxjdj', 'Nanavati chowk, Rajkot', '9076484684', '2020-08-01', '13:42:00', NULL, 'pending', NULL, 3.8, 3.8, 22.3054267, 70.7684229, '2020-08-01 12:37:43', 1, '2020-08-01 12:37:43', 1, 127, NULL),
(166, 'any where', 'any where', '0108202004', '2020-08-01', '13:38:00', NULL, 0, 0, 'Hitesh', 'test 3', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-01 12:39:15', 1, '2020-08-01 12:39:15', 1, 128, NULL),
(167, 'hitesh', 'garden villa, sadhuvasvani road, nr raiya road, rajkot', '9825998125', '2020-08-01', '13:42:00', NULL, 22.2939632, 70.7589004, 'arav', 'kalawad road', '4678457645', '2020-08-01', '13:42:00', NULL, 'pending', NULL, 19.81, 19.81, 22.2125008, 70.5877967, '2020-08-01 12:43:03', 1, '2020-08-01 12:43:03', 1, 129, NULL),
(168, 'hitesh', 'kalavad road', '0108202013', '2020-08-01', '13:59:00', NULL, 22.2125008, 70.5877967, 'nor', 'university road', '0108202014', '2020-08-01', '13:59:00', NULL, 'pending', NULL, 7163.23, 7163.23, 54.5831973, -5.9368525, '2020-08-01 13:01:20', 1, '2020-08-01 13:01:20', 1, 130, NULL),
(169, 'test', 'test', '0108202013', '2020-08-01', '16:45:00', NULL, 0, 0, 'hitesh', 'test', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-01 15:47:22', 1, '2020-08-01 15:47:22', 1, 131, NULL),
(170, 'any', 'any', '0108202013', '2020-08-01', '17:26:00', NULL, 0, 0, 'hitesh', 'test', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-01 16:27:36', 1, '2020-08-01 16:27:36', 1, 132, NULL),
(171, 'hitesh', 'university road, rajkot', '9825998125', '2020-08-01', '18:13:00', NULL, 22.2876452, 70.7622956, 'aaabbbcc', 'milapnagar 4, opp innovative school', '4679487546', '2020-08-01', '18:13:00', NULL, 'pending', NULL, 945.24, 945.24, 28.6229834, 77.0638283, '2020-08-01 17:13:50', 1, '2020-08-01 17:13:50', 1, 133, NULL),
(172, 'The Grand Thakar', 'Jawahar Rd, Opposite Jubilee Garden, Sadar, Rajkot, Gujarat 360001', '9825998125', '2020-08-01', '18:13:00', NULL, 0, 0, 'hitesh', 'milapnagar 4, opp innovative school, university road', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-01 17:14:29', 1, '2020-08-01 17:14:29', 1, 134, NULL),
(173, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-04', '09:23:00', NULL, 22.2729455, 70.7565578, 'Amin bhai', 'Milap nagar 4, opp. innovative school, University road, Rajkot', '9879944744', '2020-08-04', '09:23:00', NULL, 'pending', NULL, 1.85, 1.85, 22.2863977, 70.7671884, '2020-08-04 08:19:33', 1, '2020-08-04 08:19:33', 1, 135, NULL),
(174, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-04', '09:48:00', NULL, 22.2729455, 70.7565578, 'Amin bapu', 'Milap nagar 4, opp. innovative school, University road', '9879944744', '2020-08-04', '09:48:00', NULL, 'pending', NULL, 1.85, 1.85, 22.2863977, 70.7671884, '2020-08-04 08:43:08', 1, '2020-08-04 08:43:08', 1, 136, NULL),
(175, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-04', '10:25:00', NULL, 22.2729455, 70.7565578, 'Jinga bapu', 'mavdi chowkdi, Rajkot', '9879944744', '2020-08-04', '10:35:00', NULL, 'pending', NULL, 3.25, 3.25, 22.2629975, 70.7862588, '2020-08-04 09:20:45', 1, '2020-08-04 09:20:45', 1, 137, NULL),
(176, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-04', '10:25:00', NULL, 22.2729455, 70.7565578, 'Jinga bapu Hotel', 'Milap nagar 4, opp. innovative school, University road, Rajkot', '9879944744', '2020-08-04', '10:25:00', NULL, 'pending', NULL, 1.85, 3.25, 22.2863977, 70.7671884, '2020-08-04 09:20:45', 1, '2020-08-04 09:20:45', 1, 137, NULL),
(177, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-04', '11:10:00', NULL, 22.2729455, 70.7565578, 'hshsj', 'jsjsj', '9879944744', '2020-08-04', '11:10:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 10:05:44', 1, '2020-08-04 10:05:44', 1, 142, NULL),
(178, 'Jaydeep Bhatt', 'jzjsj', '9033348602', '2020-08-04', '11:13:00', NULL, 0, 0, 'jsjsj', 'jdjdj', '9879944744', '2020-08-04', '11:13:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 10:07:31', 1, '2020-08-04 10:07:31', 1, 143, NULL),
(179, 'Jaydeep Bhatt', 'jdjdj', '9033348602', '2020-08-04', '11:53:00', NULL, 0, 0, 'jsjs', 'jdjdj', '9876543210', '2020-08-04', '11:53:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 10:47:50', 1, '2020-08-04 10:47:50', 1, 144, NULL),
(180, 'Jaydeep Bhatt', 'hxjxj', '9033348602', '2020-08-04', '11:56:00', NULL, 0, 0, 'jsjsj', 'jdjdjd', '9876642135', '2020-08-04', '11:56:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 10:52:50', 1, '2020-08-04 10:52:50', 1, 145, NULL),
(181, 'Jaydeep Bhatt', 'hxjxj', '9033348602', '2020-08-04', '11:56:00', NULL, 0, 0, 'hshdh', 'hxhdj', '9879944152', '2020-08-04', '11:56:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 10:52:50', 1, '2020-08-04 10:52:50', 1, 145, NULL),
(182, 'Jaydeep Bhatt', 'jdjdj', '9033348602', '2020-08-04', '12:06:00', NULL, 0, 0, 'hshsh', 'jdjdj', '9876543210', '2020-08-04', '12:06:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 11:01:10', 1, '2020-08-04 11:01:10', 1, 146, NULL),
(183, 'Jaydeep Bhatt', 'jdjdj', '9033348602', '2020-08-04', '12:06:00', NULL, 0, 0, 'hshsh', 'jdjdjd', '9876543210', '2020-08-04', '12:06:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 11:01:10', 1, '2020-08-04 11:01:10', 1, 146, NULL),
(184, 'Jaydeep Bhatt', 'jsjsj', '9033348602', '2020-08-04', '12:07:00', NULL, 0, 0, 'jdjsj', 'jdjdj', '9876543510', '2020-08-04', '12:07:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 11:01:45', 1, '2020-08-04 11:01:45', 1, 147, NULL),
(185, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-04', '12:46:00', NULL, 22.2729455, 70.7565578, 'Ramesh bhai', 'test', '9033348602', '2020-08-04', '13:45:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 11:41:36', 1, '2020-08-04 11:41:36', 1, 148, NULL),
(186, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-04', '12:46:00', NULL, 22.2729455, 70.7565578, 'test bhI', 'mavdi chowkdi, Rajkot', '9879645315', '2020-08-04', '14:45:00', NULL, 'pending', NULL, 3.25, 0, 22.2629975, 70.7862588, '2020-08-04 11:41:36', 1, '2020-08-04 11:41:36', 1, 148, NULL),
(187, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '13:50:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 11:45:01', 1, '2020-08-04 11:45:01', 1, 149, NULL),
(188, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'bhanu bhai', 'Amin marg , Rajkot', '9876843510', '2020-08-04', '15:50:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 11:45:01', 1, '2020-08-04 11:45:01', 1, 149, NULL),
(189, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-04', '12:52:00', NULL, 22.2729455, 70.7565578, 'Upadhyay bhai', 'Milap nagar 4, opp. innovative school, University road, Rajkot', '9652537976', '2020-08-04', '13:50:00', NULL, 'pending', NULL, 1.85, 1.85, 22.2863977, 70.7671884, '2020-08-04 11:47:33', 1, '2020-08-04 11:47:33', 1, 150, NULL),
(190, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-04', '12:52:00', NULL, 22.2729455, 70.7565578, 'keyur bhai', 'Milap nagar 4, opp. innovative school, University road', '9654254648', '2020-08-04', '15:50:00', NULL, 'pending', NULL, 1.85, 0, 22.2863977, 70.7671884, '2020-08-04 11:47:33', 1, '2020-08-04 11:47:33', 1, 150, NULL),
(191, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:53:00', NULL, 0, 0, 'jdjdj', 'jdjdj', '9879944744', '2020-08-04', '13:50:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 11:49:09', 1, '2020-08-04 11:49:09', 1, 151, NULL),
(192, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:53:00', NULL, 0, 0, 'bhanu bhai', 'Milap nagar 4, opp. innovative school, University road, Rajkot', '9876543545', '2020-08-04', '14:50:00', NULL, 'pending', NULL, 0, 0, 22.2863977, 70.7671884, '2020-08-04 11:49:09', 1, '2020-08-04 11:49:09', 1, 151, NULL),
(193, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:53:00', NULL, 0, 0, 'pratap bhai', 'Milap nagar 4, opp. innovative school, University road', '9876843510', '2020-08-04', '15:50:00', NULL, 'pending', NULL, 0, 0, 22.2863977, 70.7671884, '2020-08-04 11:49:09', 1, '2020-08-04 11:49:09', 1, 151, NULL),
(194, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:55:00', NULL, 0, 0, 'amrut bhai', 'Milap nagar 4, opp. innovative school, University road, Rajkot', '9876843510', '2020-08-04', '13:55:00', NULL, 'pending', NULL, 0, 0, 22.2863977, 70.7671884, '2020-08-04 11:50:01', 1, '2020-08-04 11:50:01', 1, 152, NULL),
(195, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 11:52:49', 1, '2020-08-04 11:52:49', 1, 153, NULL),
(196, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 11:52:49', 1, '2020-08-04 11:52:49', 1, 153, NULL),
(197, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 11:53:47', 1, '2020-08-04 11:53:47', 1, 154, NULL),
(198, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 11:53:47', 1, '2020-08-04 11:53:47', 1, 154, NULL),
(199, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 11:54:21', 1, '2020-08-04 11:54:21', 1, 155, NULL),
(200, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 11:54:21', 1, '2020-08-04 11:54:21', 1, 155, NULL),
(201, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 11:55:41', 1, '2020-08-04 11:55:41', 1, 156, NULL),
(202, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 11:55:41', 1, '2020-08-04 11:55:41', 1, 156, NULL),
(203, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 11:55:45', 1, '2020-08-04 11:55:45', 1, 157, NULL),
(204, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 11:55:45', 1, '2020-08-04 11:55:45', 1, 157, NULL),
(205, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 11:56:09', 1, '2020-08-04 11:56:09', 1, 158, NULL),
(206, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 11:56:09', 1, '2020-08-04 11:56:09', 1, 158, NULL),
(207, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 11:56:35', 1, '2020-08-04 11:56:35', 1, 159, NULL),
(208, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 11:56:35', 1, '2020-08-04 11:56:35', 1, 159, NULL),
(209, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 11:57:27', 1, '2020-08-04 11:57:27', 1, 160, NULL),
(210, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 11:57:27', 1, '2020-08-04 11:57:27', 1, 160, NULL),
(211, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 11:59:11', 1, '2020-08-04 11:59:11', 1, 161, NULL),
(212, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 11:59:11', 1, '2020-08-04 11:59:11', 1, 161, NULL),
(213, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-04', '13:20:00', NULL, 0, 0, 'Jaydeep Bhatt', 'mavdi chowkdi, Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 12:15:30', 1, '2020-08-04 12:15:30', 1, 162, NULL),
(214, 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-04', '13:21:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Milap nagar 4, opp. innovative school, University road, Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 12:16:02', 1, '2020-08-04 12:16:02', 1, 163, NULL),
(215, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 14:47:54', 1, '2020-08-04 14:47:54', 1, 164, NULL),
(216, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 14:47:54', 1, '2020-08-04 14:47:54', 1, 164, NULL),
(217, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 14:50:22', 1, '2020-08-04 14:50:22', 1, 165, NULL),
(218, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 14:50:22', 1, '2020-08-04 14:50:22', 1, 165, NULL),
(219, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 14:51:13', 1, '2020-08-04 14:51:13', 1, 166, NULL),
(220, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 14:51:13', 1, '2020-08-04 14:51:13', 1, 166, NULL),
(221, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 14:51:35', 1, '2020-08-04 14:51:35', 1, 167, NULL),
(222, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 14:51:35', 1, '2020-08-04 14:51:35', 1, 167, NULL),
(223, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 14:52:22', 1, '2020-08-04 14:52:22', 1, 168, NULL),
(224, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 14:52:22', 1, '2020-08-04 14:52:22', 1, 168, NULL),
(225, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 14:53:13', 1, '2020-08-04 14:53:13', 1, 169, NULL),
(226, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 14:53:13', 1, '2020-08-04 14:53:13', 1, 169, NULL),
(227, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 14:53:32', 1, '2020-08-04 14:53:32', 1, 170, NULL),
(228, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 14:53:32', 1, '2020-08-04 14:53:32', 1, 170, NULL),
(229, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-05', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 14:55:59', 1, '2020-08-04 14:55:59', 1, 171, NULL),
(230, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-05', '13:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 14:55:59', 1, '2020-08-04 14:55:59', 1, 171, NULL),
(231, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-04', '17:09:00', NULL, 22.2729455, 70.7565578, 'Bhayku bhai', 'Amin marg , Rajkot', '9879944714', '2020-08-05', '17:09:00', NULL, 'pending', NULL, 2.87, 2.87, 22.2868979, 70.7800157, '2020-08-04 16:04:36', 1, '2020-08-04 16:04:36', 1, 172, NULL),
(232, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-04', '17:10:00', NULL, 22.2729455, 70.7565578, 'khajur bhai', 'Amin marg , Rajkot', '9879944744', '2020-08-04', '17:15:00', NULL, 'pending', NULL, 2.87, 2.87, 22.2868979, 70.7800157, '2020-08-04 16:06:45', 1, '2020-08-04 16:06:45', 1, 173, NULL),
(233, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-04', '17:10:00', NULL, 22.2729455, 70.7565578, 'khajur bhai2', 'mavdi chowkdi, Rajkot', '9879944744', '2020-08-04', '18:15:00', NULL, 'pending', NULL, 3.25, 2.72, 22.2629975, 70.7862588, '2020-08-04 16:06:45', 1, '2020-08-04 16:06:45', 1, 173, NULL),
(234, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-04', '17:36:00', NULL, 0, 0, 'Jaydeep Bhatt', 'mavdi chowkdi, Rajkot', NULL, '2020-08-04', '17:46:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-04 16:30:43', 1, '2020-08-04 16:30:43', 1, 174, NULL),
(235, 'Ultra fresh', 'ULTRA FRESH OPP.SATYSAI HOSPITEL,SATYSAI MAIN ROAD, Rajkot, Gujarat 360005.', '9033348602', '2020-08-04', '17:38:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Amin marg , Rajkot.', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-07 05:49:39', 1, '2020-08-07 10:19:39', 1, 175, NULL),
(236, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-04', '17:38:00', NULL, 22.2729455, 70.7565578, 'Amin bhai', 'Amin marg , Rajkot', '9876645124', '2020-08-04', '17:40:00', NULL, 'pending', NULL, 2.87, 2.87, 22.2868979, 70.7800157, '2020-08-04 16:33:37', 1, '2020-08-04 16:33:37', 1, 176, NULL),
(237, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005.', '9033348602', '2020-08-04', '17:45:00', NULL, 22.2729455, 70.7565578, 'Ami', 'mavdi chowkdi, Rajkot.', '9876543210', '2020-08-05', '11:00:00', NULL, 'pending', NULL, 3.25, 3.25, 22.2629975, 70.7862588, '2020-08-07 06:29:23', 1, '2020-08-07 10:59:23', 1, 177, NULL),
(238, 'Jaydeep Bhatt', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005.', '9033348602', '2020-08-04', '17:45:00', NULL, 22.2729455, 70.7565578, 'maniyo', NULL, '9876543510', '2020-08-05', '12:00:00', NULL, 'pending', NULL, 3.25, 0, 22.2629975, 70.7862588, '2020-08-07 06:29:23', 1, '2020-08-07 10:59:23', 1, 177, NULL),
(239, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '7567777994', '2020-08-09', '11:10:00', NULL, 0, 0, 'Krishna', 'Kanhai', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-09 10:12:25', 1, '2020-08-09 10:12:25', 1, 178, NULL),
(240, 'The Grand Thakar', 'Jawahar Rd, Opposite Jubilee Garden, Sadar, Rajkot, Gujarat 360001', '7567777994', '2020-08-09', '11:28:00', NULL, 0, 0, 'Nishi', 'Kanhai', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-09 10:28:56', 1, '2020-08-09 10:28:56', 1, 179, NULL),
(241, 'The Grand Murlidhar TGM', 'Jamnagar - Rajkot Hwy, Naranka, Gujarat 360110', '7567777994', '2020-08-09', '11:38:00', NULL, 0, 0, 'Krishna', 'kanhai', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-09 10:39:07', 1, '2020-08-09 10:39:07', 1, 180, NULL),
(242, 'Hitesh', 'test', '9327647270', '2020-08-09', '23:55:00', NULL, 0, 0, 'Normal', 'test9', '0908202000', '2020-08-10', '23:55:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-09 22:56:38', 1, '2020-08-09 22:56:38', 1, 181, NULL),
(243, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9327647270', '2020-08-10', '00:01:00', NULL, 0, 0, 'Hitesh', 'test9', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-09 23:02:22', 1, '2020-08-09 23:02:22', 1, 182, NULL),
(244, 'The Grand Thakar', 'Jawahar Rd, Opposite Jubilee Garden, Sadar, Rajkot, Gujarat 360001', NULL, '2020-08-10', '09:45:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-10 08:49:31', 1, '2020-08-10 08:49:31', 1, 183, NULL),
(245, 'The Grand Thakar', 'Jawahar Rd, Opposite Jubilee Garden, Sadar, Rajkot, Gujarat 360001', NULL, '2020-08-10', '09:45:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-10 08:50:13', 1, '2020-08-10 08:50:13', 1, 184, NULL),
(246, 'Pickup address jaydeep', 'Pickup address jaydeep', NULL, '2020-08-10', '09:56:00', NULL, 0, 0, 'Jaydeep Bhatt', 'delivery address jaydeep', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-10 08:51:23', 1, '2020-08-10 08:51:23', 1, 185, NULL),
(247, 'Jaydeep Bhatt', 'Nanavati chowk, Rajkot', '9033348602', '2020-08-10', '10:00:00', NULL, 22.3054267, 70.7684229, 'divyesh bhai', 'Mavdi chowkdi, Rajkot', '9879944744', '2020-08-10', '11:00:00', NULL, 'pending', NULL, 5.05, 5.05, 22.2629975, 70.7862588, '2020-08-10 08:55:17', 1, '2020-08-10 08:55:17', 1, 186, NULL),
(248, 'The Grand Thakar', 'Jawahar Rd, Opposite Jubilee Garden, Sadar, Rajkot, Gujarat 360001', NULL, '2020-08-10', '09:45:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Rajkot', '7016697110', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-10 15:20:14', 1, '2020-08-10 15:20:14', 1, 187, NULL),
(249, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '12:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-10 15:21:08', 1, '2020-08-10 15:21:08', 1, 188, NULL),
(250, 'Jaydeep Bhatt', 'test', '9033348602', '2020-08-04', '12:48:00', NULL, 0, 0, 'test', 'test', '9876543518', '2020-08-04', '13:49:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-10 15:21:08', 1, '2020-08-10 15:21:08', 1, 188, NULL),
(251, 'Divyesh Lunagariya', '17, Ranchoddnagar', '7016697110', '2020-08-10', '16:15:00', NULL, 22.3087778, 70.8134818, 'Shah rukh khan', 'rivera complex', '9033348602', '2020-08-10', '16:38:00', 'fhhhh', 'pending', NULL, 13701, 13701, 33.9840242, -118.2560713, '2020-08-10 15:43:42', 1, '2020-08-10 15:43:42', 1, 189, NULL),
(252, 'Divyesh Lunagariya', '17, Ranchoddnagar', '7016697110', '2020-08-10', '16:15:00', NULL, 22.3087778, 70.8134818, 'keval', 'jamnagar', '7016697110', '2020-08-10', '17:40:00', NULL, 'pending', NULL, 79.86, 13694.9, 22.4707019, 70.05773, '2020-08-10 15:43:42', 1, '2020-08-10 15:43:42', 1, 189, NULL),
(253, 'Reliance Mall', 'Plot No 2/A, Survey No 30, 150 Feet Ring Rd, Opposite Big Bazaar, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-10', '16:55:00', NULL, 0, 0, 'Divyesh Lunagariya', 'Ranchoddnagar', '7016697110', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-10 15:57:02', 1, '2020-08-10 15:57:02', 1, 190, NULL),
(254, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-10', '17:02:00', NULL, 0, 0, 'Divyesh Lunagariya', 'Ranchoddnagar', '7016697110', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-10 16:03:24', 1, '2020-08-10 16:03:24', 1, 191, NULL),
(255, 'Natural Veggies', '224-225, Jimmy Tower, Opp Swami Narayan Gurukul,, Gondal Rd, Bhakti Nagar, Rajkot, Gujarat 360002', NULL, '2020-08-10', '17:09:00', NULL, 0, 0, 'Divyesh Lunagariya', 'Ranchoddnagar', '7016697110', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-10 16:10:22', 1, '2020-08-10 16:10:22', 1, 192, NULL),
(256, 'Kuldevi krupa fruits & vegetable', 'Tirupati Palace,, shop No 1,, Jyoti Nagar, Ghanshyam Nagar Main Rd, Rajkot, Gujarat 360005', NULL, '2020-08-14', '16:33:00', NULL, 0, 0, 'hitesh', 'milapnagar,  opp. innovative school,  uni. road', '9825998125', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-14 15:34:34', 1, '2020-08-14 15:34:34', 1, 202, NULL),
(257, 'kanhai', 'kanhai', NULL, '2020-08-14', '17:46:00', NULL, 0, 0, 'NIRMAL', 'krishnam', '9825790687', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-14 16:47:22', 1, '2020-08-14 16:47:22', 1, 203, NULL),
(258, 'Krishnam', 'Krishnam, Lakhajiraj Road.', NULL, '2020-08-14', '17:48:00', NULL, 0, 0, 'NIRMAL', 'kanhai, Test', '9825790687', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-14 13:35:03', 1, '2020-08-14 18:05:03', 1, 204, NULL),
(259, 'Reliance Mall', 'Plot No 2/A, Survey No 30, 150 Feet Ring Rd, Opposite Big Bazaar, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-14', '18:32:00', NULL, 0, 0, 'test', 'test', '1408202000', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-14 17:33:01', 1, '2020-08-14 17:33:01', 1, 205, NULL),
(260, 'Jaydeep Bhatt', 'Nanavati chowk,Rajkot', '9033348602', '2020-08-17', '09:17:00', NULL, 22.3054267, 70.7684229, 'Divu bhai', 'Mavdi chowk,Rajkot', '9879944744', '2020-08-17', '11:15:00', NULL, 'pending', NULL, 4.79, 4.79, 22.2648399, 70.7845993, '2020-08-17 08:17:43', 1, '2020-08-17 08:17:43', 1, 206, NULL),
(261, 'Rahul bhai', 'Nanavati chowk,Rajkot', '9033348602', '2020-08-17', '09:28:00', NULL, 22.3054267, 70.7684229, 'Rajendra bapu', 'Nana mava circle,Rajkot', '9999999999', '2020-08-17', '11:30:00', NULL, 'pending', NULL, 3.42, 3.42, 22.2758934, 70.7779983, '2020-08-17 08:28:41', 1, '2020-08-17 08:28:41', 1, 207, NULL),
(262, 'Rahul bhai', 'Nanavati chowk,Rajkot', '9033348602', '2020-08-17', '09:28:00', NULL, 22.3054267, 70.7684229, 'Rajendra bapu', 'Nana mava circle,Rajkot', '9999999999', '2020-08-17', '11:30:00', NULL, 'pending', NULL, 3.42, 3.42, 22.2758934, 70.7779983, '2020-08-17 08:30:06', 1, '2020-08-17 08:30:06', 1, 208, NULL),
(263, 'Rahul bhai', 'Nanavati chowk, Rajkot', '9033348602', '2020-08-17', '10:51:00', NULL, 22.3054267, 70.7684229, 'Ghanshyam bhai', 'Nana mava circle, Rajkot', '9879944744', '2020-08-17', '11:50:00', NULL, 'pending', NULL, 3.42, 3.42, 22.2758934, 70.7779983, '2020-08-17 09:46:34', 1, '2020-08-17 09:46:34', 1, 209, NULL),
(264, 'Jaydeep Bhatt', 'Ghanshyam', '9033348602', '2020-08-17', '10:53:00', NULL, 0, 0, 'Mohan bhai', 'Rajkot', '9879944744', '2020-08-17', '11:50:00', NULL, 'pending', NULL, 0, 0, 22.3038945, 70.8021599, '2020-08-17 09:47:53', 1, '2020-08-17 09:47:53', 1, 210, NULL),
(265, 'Shakti Veg Shop', 'Raj Palace Opp. Nakshatra-5, Sadhu Vaswani Road, Yogi Nagar, Rajkot, Gujarat 360005', NULL, '2020-08-17', '11:58:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-17 10:53:03', 1, '2020-08-17 10:53:03', 1, 211, NULL),
(266, 'Shakti Veg Shop', 'Raj Palace Opp. Nakshatra-5, Sadhu Vaswani Road, Yogi Nagar, Rajkot, Gujarat 360005', NULL, '2020-08-17', '11:58:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-17 07:01:32', 1, '2020-08-17 11:07:28', 1, 212, NULL),
(267, 'Nanavati chowk, rajkot', 'Nanavati chowk, rajkot', NULL, '2020-08-17', '12:37:00', NULL, 0, 0, 'Jaydeep Bhatt', 'My home', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-17 11:32:35', 1, '2020-08-17 11:32:35', 1, 213, NULL),
(268, 'Shakti Veg Shop', 'Raj Palace Opp. Nakshatra-5, Sadhu Vaswani Road, Yogi Nagar, Rajkot, Gujarat 360005', NULL, '2020-08-17', '11:58:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-17 11:34:41', 1, '2020-08-17 11:34:41', 1, 214, NULL),
(269, 'Jaydeep bhatt', 'Rajkot', '9033348602', '2020-08-17', '13:01:00', NULL, 22.3038945, 70.8021599, 'Manoj bhai', 'Rajkot 2', '9879944744', '2020-08-17', '14:00:00', NULL, 'pending', NULL, 3.31, 3.31, 22.2937378, 70.7719152, '2020-08-17 11:56:27', 1, '2020-08-17 11:56:27', 1, 215, NULL),
(270, 'Golden super market, Rajkot', 'Golden super market, Rajkot', NULL, '2020-08-17', '13:03:00', NULL, 0, 0, 'Jaydeep bhatt', 'Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-17 11:57:54', 1, '2020-08-17 11:57:54', 1, 216, NULL),
(271, 'Natural Veggies', '224-225, Jimmy Tower, Opp Swami Narayan Gurukul,, Gondal Rd, Bhakti Nagar, Rajkot, Gujarat 360002', NULL, '2020-08-17', '13:06:00', NULL, 0, 0, 'Jaydeep bhatt', 'Nanavati chowk, Rajkot', NULL, NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-17 12:00:32', 1, '2020-08-17 12:00:32', 1, 217, NULL),
(272, 'hitesh', 'mahavir nagar , street no 5, janak, university road,  rajkot', '9825998125', '2020-08-17', '13:19:00', NULL, 22.2876452, 70.7622956, 'test', 'milapnagar 4, opp innovative school, university road', '7016811691', '2020-08-17', '15:20:00', NULL, 'pending', NULL, 0.52, 0.52, 22.2863977, 70.7671884, '2020-08-17 12:20:42', 1, '2020-08-17 12:20:42', 1, 218, NULL),
(273, 'hitesh', 'university road, rajkot', '9825998125', '2020-08-17', '11:04:00', NULL, 22.2876452, 70.7622956, 'Amin bhai', 'Rivera wave, kalawad road, rajkot', '9879944744', '2020-08-17', '12:10:00', NULL, 'pending', NULL, 1.71, 1.71, 22.2730401, 70.7569436, '2020-08-17 12:23:07', 1, '2020-08-17 12:23:07', 1, 219, NULL),
(274, 'hitesh', 'university road, rajkot', '9825998125', '2020-08-17', '11:04:00', NULL, 22.2876452, 70.7622956, 'Amin bhai', 'Rivera wave, kalawad road, rajkot', '9879944744', '2020-08-17', '12:10:00', NULL, 'pending', NULL, 1.71, 1.71, 22.2730401, 70.7569436, '2020-08-17 12:23:10', 1, '2020-08-17 12:23:10', 1, 220, NULL),
(275, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-17', '13:24:00', NULL, 0, 0, 'hitesh', 'Rivera wave, kalawad road,  rajkot', '9825998125', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-17 12:25:20', 1, '2020-08-17 12:25:20', 1, 221, NULL),
(276, 'Jaydeep Bhatt', '224-225, Jimmy Tower, Opp Swami Narayan Gurukul,, Gondal Rd, Bhakti Nagar, Rajkot, Gujarat 360002', '9033348602', '2020-08-17', '15:29:00', NULL, 22.2769818, 70.7995822, 'Amrut bhai', 'Nanavati chowk, Rajkot', '9879944744', '2020-08-17', '16:30:00', NULL, 'pending', NULL, 4.5, 4.5, 22.3054267, 70.7684229, '2020-08-17 14:25:31', 1, '2020-08-17 14:25:31', 1, 222, NULL),
(277, 'Jaydeep Bhatt', '224-225, Jimmy Tower, Opp Swami Narayan Gurukul,, Gondal Rd, Bhakti Nagar, Rajkot, Gujarat 360002', '9033348602', '2020-08-17', '15:29:00', NULL, 22.2769818, 70.7995822, 'Mehbub bhai', 'Nanavati chowk, Rajkot', '9879944744', '2020-08-17', '17:30:00', NULL, 'pending', NULL, 4.5, 0, 22.3054267, 70.7684229, '2020-08-17 14:25:31', 1, '2020-08-17 14:25:31', 1, 222, NULL),
(278, 'Jaydeep Bhatt', 'Nanavati chowk, Rajkot', '9033348602', '2020-08-17', '15:33:00', NULL, 22.3054267, 70.7684229, 'Dhanji bhai', 'Mota mava main road, Rajkot', '9879944744', '2020-08-17', '16:40:00', NULL, 'pending', NULL, 4.99, 4.99, 22.2606432, 70.7626295, '2020-08-17 14:34:31', 1, '2020-08-17 14:34:31', 1, 223, NULL),
(279, 'hitesh', 'university road, rajkot', '9033348602', '2020-08-17', '11:04:00', NULL, 22.2876452, 70.7622956, 'Amin bhai', 'Rivera wave, kalawad road, rajkot', '9879944744', '2020-08-17', '12:10:00', NULL, 'pending', NULL, 1.71, 1.71, 22.2730401, 70.7569436, '2020-08-17 15:20:20', 1, '2020-08-17 15:20:20', 1, 224, NULL),
(280, 'Natural Veggies', '224-225, Jimmy Tower, Opp Swami Narayan Gurukul,, Gondal Rd, Bhakti Nagar, Rajkot, Gujarat 360002', NULL, '2020-08-17', '16:30:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-17 15:36:20', 1, '2020-08-17 15:36:20', 1, 225, NULL),
(281, 'Natural Veggies', '224-225, Jimmy Tower, Opp Swami Narayan Gurukul,, Gondal Rd, Bhakti Nagar, Rajkot, Gujarat 360002', NULL, '2020-08-17', '16:30:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-17 15:37:16', 1, '2020-08-17 15:37:16', 1, 226, NULL),
(282, 'Jaydeep Bhatt', 'Rajkot', '9033348602', '2020-08-17', '16:43:00', NULL, 22.3038945, 70.8021599, 'Aman bhai', 'Rajkot', '9879944744', '2020-08-17', '17:40:00', NULL, 'pending', NULL, 0, 0, 22.3038945, 70.8021599, '2020-08-17 15:38:21', 1, '2020-08-17 15:38:21', 1, 227, NULL),
(283, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-17', '16:47:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Nanavati chowk, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-17 15:42:33', 1, '2020-08-17 15:42:33', 1, 228, NULL),
(284, 'Jaydeep logout', 'Nanavati chowk Rajkot', '9033348602', '2020-08-17', '16:58:00', NULL, 22.3054267, 70.7684229, 'Divyesh bhai', 'Mota mava main road, Rajkot', '9879944744', '2020-08-17', '17:55:00', NULL, 'pending', NULL, 4.99, 4.99, 22.2606432, 70.7626295, '2020-08-17 15:53:25', 1, '2020-08-17 15:53:25', 1, 229, NULL),
(285, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-17', '17:12:00', NULL, 0, 0, 'Jaydeep Bhatt logout', 'Rajkot .', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-17 16:07:06', 1, '2020-08-17 16:07:06', 1, 230, NULL),
(286, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-17', '17:14:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Nanavati chowk, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-17 16:08:56', 1, '2020-08-17 16:08:56', 1, 231, NULL),
(287, 'Jaydeep Bhatt', 'Nanavati chowk, Rajkot', '9033348602', '2020-08-17', '17:15:00', NULL, 22.3054267, 70.7684229, 'Divyesh bhai', 'Nana mava main , Rajkot', '9879944744', '2020-08-17', '18:15:00', NULL, 'pending', NULL, 4.04, 4.04, 22.2689454, 70.7704147, '2020-08-17 16:10:21', 1, '2020-08-17 16:10:21', 1, 232, NULL),
(288, 'jaydeep without login', 'Nanavati chowk, Rajkot', '9033348602', '2020-08-17', '17:16:00', NULL, 22.3054267, 70.7684229, 'divyesh bhai', 'Mota mava main road, Rajkot', '9879944744', '2020-08-17', '18:15:00', NULL, 'pending', NULL, 4.99, 4.99, 22.2606432, 70.7626295, '2020-08-17 16:11:57', 1, '2020-08-17 16:11:57', 1, 233, NULL),
(289, 'Rajkot', 'Rajkot', NULL, '2020-08-17', '17:24:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-17 16:19:03', 1, '2020-08-17 16:19:03', 1, 234, NULL),
(290, 'Jaydeep Bhatt', 'Rajkot2', '9033348602', '2020-08-17', '17:25:00', NULL, 22.2937378, 70.7719152, 'Amin bhai', 'Rajkot', '9879944744', '2020-08-17', '18:25:00', NULL, 'pending', NULL, 3.31, 3.31, 22.3038945, 70.8021599, '2020-08-17 16:20:24', 1, '2020-08-17 16:20:24', 1, 235, NULL),
(291, 'Natural Veggies', '224-225, Jimmy Tower, Opp Swami Narayan Gurukul,, Gondal Rd, Bhakti Nagar, Rajkot, Gujarat 360002', NULL, '2020-08-17', '17:31:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-17 16:25:44', 1, '2020-08-17 16:25:44', 1, 236, NULL),
(292, 'Golden super market, Rajkot', 'Golden super market, Rajkot', NULL, '2020-08-17', '17:32:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-17 16:27:39', 1, '2020-08-17 16:27:39', 1, 237, NULL),
(293, 'Jaydeep Bhatt', 'Nanavati chowk, Rajkot', '9033348602', '2020-08-17', '17:34:00', NULL, 22.3054267, 70.7684229, 'divyesh bhai', 'Nana mava main road Rajkot', '9879944744', '2020-08-17', '18:30:00', NULL, 'pending', NULL, 4.04, 4.04, 22.2689454, 70.7704147, '2020-08-17 16:28:44', 1, '2020-08-17 16:28:44', 1, 238, NULL),
(294, 'Ultra fresh', 'ULTRA FRESH OPP.SATYSAI HOSPITEL,SATYSAI MAIN ROAD, Rajkot, Gujarat 360005', NULL, '2020-08-17', '17:35:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-17 16:29:45', 1, '2020-08-17 16:29:45', 1, 239, NULL),
(295, 'Jaydeep Bhatt', 'Nanavati chowk, Rajkot', '9033348602', '2020-08-18', '11:12:00', NULL, 22.3054267, 70.7684229, 'Delivery 1', 'Nanavati mava main road, Rajkot', '9879944744', '2020-08-18', '12:10:00', NULL, 'pending', NULL, 0.06, 0.06, 22.305948, 70.768329, '2020-08-18 10:13:56', 1, '2020-08-18 10:13:56', 1, 240, NULL),
(296, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-18', '11:13:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Nanavati mava main road, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-18 10:14:47', 1, '2020-08-18 10:14:47', 1, 241, NULL),
(297, 'hitesh', '4, milapnagar,  opp. innovative school,  panchayat chawk,  university road', '9825998125', '2020-08-18', '18:15:00', 'that\'s it', 22.2863977, 70.7671884, 'aaarav', 'mahavir nagar, a3, block no 111, raiya road', '7016811691', '2020-08-19', '09:20:00', 'aaa', 'pending', NULL, 1.71, 1.71, 22.3012399, 70.7627533, '2020-08-18 19:22:34', 1, '2020-08-18 19:22:34', 1, 242, NULL),
(298, 'garden villa, sadhuvasvani road, nr raiya road, rajkot', 'garden villa, sadhuvasvani road, nr raiya road, rajkot', NULL, '2020-08-18', '20:25:00', NULL, 0, 0, 'hitesh', 'milapnagar 4, opp innovative school, university road', '9825998125', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-18 19:26:50', 1, '2020-08-18 19:26:50', 1, 243, NULL),
(299, 'The Grand Murlidhar TGM', 'Jamnagar - Rajkot Hwy, Naranka, Gujarat 360110', NULL, '2020-08-18', '20:39:00', NULL, 0, 0, 'hitesh', 'milapnagar,  opp. innovative school,  uni. road', '7016811691', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-18 19:42:57', 1, '2020-08-18 19:42:57', 1, 244, NULL),
(300, 'hitesh', 'Tirupati Palace,, shop No 1,, Jyoti Nagar, Ghanshyam Nagar Main Rd, Rajkot, Gujarat 360005', '9825998125', '2020-08-19', '21:01:00', NULL, 22.2818652, 70.7611615, 'test', 'milapnagar 4, opp innovative school, university road', '7016811691', '2020-08-20', '21:01:00', NULL, 'pending', NULL, 0.8, 0.8, 22.2863977, 70.7671884, '2020-08-18 20:02:51', 1, '2020-08-18 20:02:51', 1, 245, NULL),
(301, 'Balaji Super Market', 'Aval Complex, Ground FLoor, University Road, Panchayat Nagar Chowk, Rajkot, Gujarat 360005', NULL, '2020-08-19', '15:21:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Nanavati mava main road, Rajkot', '9033348602', NULL, NULL, 'send fast', 'pending', NULL, 0, 0, 0, 0, '2020-08-19 14:22:36', 1, '2020-08-19 14:22:36', 1, 246, NULL),
(302, 'Jaydeep Bhatt', 'Nanavati chowk, Rajkot', '9033348602', '2020-08-19', '17:21:00', 'Comment for sender', 22.3054267, 70.7684229, 'Divyesh bhai', 'Nanavati mava main road, Rajkot', '7016697110', '2020-08-20', '18:20:00', 'comment for receiver 1', 'pending', NULL, 0.06, 0.06, 22.305948, 70.768329, '2020-08-19 16:24:50', 1, '2020-08-19 16:24:50', 1, 247, NULL),
(303, 'Jaydeep Bhatt', 'Nanavati chowk, Rajkot', '9033348602', '2020-08-19', '17:21:00', 'Comment for sender', 22.3054267, 70.7684229, 'Divyesh bhai 2', 'Nanavati mava main road, Rajkot', '9427414702', '2020-08-20', '19:20:00', 'comment for receiver 2', 'pending', NULL, 0.06, 0, 22.305948, 70.768329, '2020-08-19 16:24:50', 1, '2020-08-19 16:24:50', 1, 247, NULL),
(304, 'Jaydeep Bhatt', 'Nanavati chowk, Rajkot', '9033348602', '2020-08-19', '17:21:00', 'Comment for sender', 22.3054267, 70.7684229, 'Divyesh bhai', 'Nanavati mava main road, Rajkot', '7016697110', '2020-08-20', '18:20:00', 'comment for receiver 1', 'pending', NULL, 0.06, 0.06, 22.305948, 70.768329, '2020-08-19 16:32:09', 1, '2020-08-19 16:32:09', 1, 248, NULL),
(305, 'Jaydeep Bhatt', 'Nanavati chowk, Rajkot', '9033348602', '2020-08-19', '17:21:00', 'Comment for sender', 22.3054267, 70.7684229, 'Divyesh bhai 2', 'Nanavati mava main road, Rajkot', '9427414702', '2020-08-20', '19:20:00', 'comment for receiver 2', 'pending', NULL, 0.06, 0, 22.305948, 70.768329, '2020-08-19 16:32:09', 1, '2020-08-19 16:32:09', 1, 248, NULL),
(306, 'Jaydeep Bhatt', 'Nanavati chowk, Rajkot', '9033348602', '2020-08-19', '17:21:00', 'Comment for sender', 22.3054267, 70.7684229, 'Divyesh bhai', 'Nanavati mava main road, Rajkot', '7016697110', '2020-08-20', '18:20:00', 'comment for receiver 1', 'pending', NULL, 0.06, 0.06, 22.305948, 70.768329, '2020-08-19 16:33:14', 1, '2020-08-19 16:33:14', 1, 249, NULL),
(307, 'Jaydeep Bhatt', 'Nanavati chowk, Rajkot', '9033348602', '2020-08-19', '17:21:00', 'Comment for sender', 22.3054267, 70.7684229, 'Divyesh bhai 2', 'Nanavati mava main road, Rajkot', '9427414702', '2020-08-20', '19:20:00', 'comment for receiver 2', 'pending', NULL, 0.06, 0, 22.305948, 70.768329, '2020-08-19 16:33:14', 1, '2020-08-19 16:33:14', 1, 249, NULL),
(308, 'Jaydeep Bhatt', 'Nanavati chowk, Rajkot', '9033348602', '2020-08-19', '17:21:00', 'Comment for sender', 22.3054267, 70.7684229, 'Divyesh bhai', 'Nanavati mava main road, Rajkot', '7016697110', '2020-08-20', '18:20:00', 'comment for receiver 1', 'pending', NULL, 0.06, 0.06, 22.305948, 70.768329, '2020-08-19 16:34:21', 1, '2020-08-19 16:34:21', 1, 250, NULL),
(309, 'Jaydeep Bhatt', 'Nanavati chowk, Rajkot', '9033348602', '2020-08-19', '17:21:00', 'Comment for sender', 22.3054267, 70.7684229, 'Divyesh bhai 2', 'Nanavati mava main road, Rajkot', '9427414702', '2020-08-20', '19:20:00', 'comment for receiver 2', 'pending', NULL, 0.06, 0, 22.305948, 70.768329, '2020-08-19 16:34:21', 1, '2020-08-19 16:34:21', 1, 250, NULL),
(310, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-19', '18:27:00', NULL, 0, 0, 'hitesh', 'milapnagar,  opp. innovative school,  uni. road', '9825998125', NULL, NULL, 'test comment', 'pending', NULL, 0, 0, 0, 0, '2020-08-19 17:28:23', 1, '2020-08-19 17:28:23', 1, 251, NULL),
(311, 'hitesh', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9825998125', '2020-08-19', '13:00:00', NULL, 22.2729455, 70.7565578, 'test', 'mahavir nagar, a3, block no 111, raiya road', '7016811691', '2020-08-19', '14:35:00', NULL, 'pending', NULL, 3.2, 3.2, 22.3012399, 70.7627533, '2020-08-19 17:36:07', 1, '2020-08-19 17:36:07', 1, 252, NULL),
(312, 'hitesh', 'Tirupati Palace,, shop No 1,, Jyoti Nagar, Ghanshyam Nagar Main Rd, Rajkot, Gujarat 360005', '9825998125', '2020-08-20', '08:35:00', NULL, 22.2818652, 70.7611615, 'test', 'milapnagar 4, opp innovative school', '7016811691', '2020-08-21', '18:39:00', NULL, 'pending', NULL, 945.8, 945.8, 28.6229834, 77.0638283, '2020-08-19 17:40:05', 1, '2020-08-19 17:40:05', 1, 253, NULL),
(313, 'hitesh', 'Tirupati Palace,, shop No 1,, Jyoti Nagar, Ghanshyam Nagar Main Rd, Rajkot, Gujarat 360005', '9825998125', '2020-08-20', '08:35:00', NULL, 22.2818652, 70.7611615, 'tet1', 'Rivera wave, kalawad road,  rajkot', '8488887048', '2020-08-22', '18:39:00', NULL, 'pending', NULL, 1.07, 946.82, 22.2730401, 70.7569436, '2020-08-19 17:40:05', 1, '2020-08-19 17:40:05', 1, 253, NULL),
(314, 'Reliance Mall', 'Plot No 2/A, Survey No 30, 150 Feet Ring Rd, Opposite Big Bazaar, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-19', '18:42:00', NULL, 0, 0, 'hitesh', 'mahavir nagar, a3, block no 111, raiya road', '9825998125', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-19 17:48:30', 1, '2020-08-19 17:48:30', 1, 254, NULL),
(315, 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-19', '18:49:00', NULL, 0, 0, 'hitesh', 'kalawad road', '9825998125', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-19 17:50:31', 1, '2020-08-19 17:50:31', 1, 255, NULL),
(316, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-19', '18:55:00', NULL, 0, 0, 'hitesh', 'Rivera wave, kalawad road,  nana mauva, nr. McDonald\'s  360005', '7016811699', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-19 17:57:59', 1, '2020-08-19 17:57:59', 1, 256, NULL),
(317, 'hitesh', 'nana mauva', '7016811699', '2020-08-20', '09:00:00', NULL, 22.2703186, 70.7609536, 'test1', 'uni road', '4444444444', '2020-08-21', '10:00:00', NULL, 'pending', NULL, 422.55, 422.55, 25.3844194, 68.364596, '2020-08-19 18:02:23', 1, '2020-08-19 18:02:23', 1, 257, NULL),
(318, 'hitesh', 'nana mauva', '7016811699', '2020-08-20', '09:00:00', NULL, 22.2703186, 70.7609536, 'test1', 'uni road', '4444444444', '2020-08-21', '10:00:00', NULL, 'pending', NULL, 422.55, 422.55, 25.3844194, 68.364596, '2020-08-19 18:02:34', 1, '2020-08-19 18:02:34', 1, 258, NULL),
(319, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-20', '11:45:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Nanavati mava main road, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-20 10:51:36', 1, '2020-08-20 10:51:36', 1, 259, NULL),
(320, 'Jaydeep Bhatt', 'University Road, Rajkot', '9033348602', '2020-08-20', '12:34:00', NULL, 22.2876452, 70.7622956, 'Divyesh bhai', 'Om Nagar, Rajkot', '7016697110', '2020-08-21', '07:35:00', 'Receiver comment 1', 'pending', NULL, 2.83, 2.83, 22.2636499, 70.771857, '2020-08-20 11:39:04', 1, '2020-08-20 11:39:04', 1, 260, NULL);
INSERT INTO `order_address` (`id`, `sender_name`, `pickup_address`, `pickup_phone`, `pickup_date`, `pickup_time`, `pickup_comment`, `pickup_lat`, `pickup_long`, `delivery_receiver_name`, `delivery_address`, `delivery_phone`, `delivery_date`, `delivery_time`, `delivery_comment`, `delivery_status`, `delivery_status_reason`, `pickup_distance`, `delivery_distance`, `delivery_lat`, `delivery_long`, `created_at`, `created_by`, `updated_at`, `updated_by`, `double_google_order_id`, `payment_status_id`) VALUES
(321, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-20', '12:51:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Nanavati chowk, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-20 11:52:52', 1, '2020-08-20 11:52:52', 1, 261, NULL),
(322, 'Jaydeep Bhatt', 'nana mauva', '9033348602', '2020-08-20', '09:00:00', NULL, 22.2703186, 70.7609536, 'test1', 'uni road', '4444444444', '2020-08-21', '10:00:00', NULL, 'pending', NULL, 422.55, 422.55, 25.3844194, 68.364596, '2020-08-20 12:12:55', 1, '2020-08-20 12:12:55', 1, 262, NULL),
(323, 'Jaydeep Bhatt', 'nana mauva', '9033348602', '2020-08-21', '15:20:00', NULL, 22.2703186, 70.7609536, 'Am that bhai', 'Om Nagar, Rajkot', '7016697110', '2020-08-22', '16:25:00', NULL, 'pending', NULL, 1.34, 1.34, 22.2636499, 70.771857, '2020-08-20 15:26:23', 1, '2020-08-20 15:26:23', 1, 263, NULL),
(324, 'The Grand Thakar', 'Jawahar Rd, Opposite Jubilee Garden, Sadar, Rajkot, Gujarat 360001', NULL, '2020-08-20', '16:53:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Om Nagar, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-20 15:54:25', 1, '2020-08-20 15:54:25', 1, 264, NULL),
(325, 'hitesh', 'university road, rajkot', '9825998125', '2020-08-21', '18:12:00', NULL, 22.2876452, 70.7622956, 'trdt', 'mahavir nagar, a3, block no 111, raiya road', '7016811411', '2020-08-21', '19:10:00', NULL, 'pending', NULL, 1.51, 1.51, 22.3012399, 70.7627533, '2020-08-20 17:12:35', 1, '2020-08-20 17:12:35', 1, 265, NULL),
(326, 'Tirupati Palace,, shop No 1,, Jyoti Nagar, Ghanshyam Nagar Main Rd, Rajkot, Gujarat 360005', 'Tirupati Palace,, shop No 1,, Jyoti Nagar, Ghanshyam Nagar Main Rd, Rajkot, Gujarat 360005', NULL, '2020-08-20', '18:18:00', NULL, 0, 0, 'hitesh', 'mahavir nagar, a3, block no 111, raiya road', '9825998125', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-20 17:21:06', 1, '2020-08-20 17:21:06', 1, 266, NULL),
(327, 'The Grand Murlidhar TGM', 'Jamnagar - Rajkot Hwy, Naranka, Gujarat 360110', NULL, '2020-08-20', '18:32:00', NULL, 0, 0, 'webz', '4 milapnagar,  opp. innovative school,  panchayat chawk', '7016811691', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-20 17:33:37', 1, '2020-08-20 17:33:37', 1, 267, NULL),
(328, 'webz', 'rivera wave', '7016811691', '2020-08-21', '14:30:00', NULL, 22.2730401, 70.7569436, 'test', 'uni road', '7777777777', '2020-08-22', '07:30:00', NULL, 'pending', NULL, 422.07, 422.07, 25.3844194, 68.364596, '2020-08-20 17:35:19', 1, '2020-08-20 17:35:19', 1, 268, NULL),
(329, 'Chandan Super market', 'Trisha Complex, Amin Marg, Rajkot, Gujarat 360001', NULL, '2020-08-20', '18:48:00', NULL, 0, 0, 'webz', 'uni road', '7016811691', NULL, NULL, 'est', 'pending', NULL, 0, 0, 0, 0, '2020-08-20 17:52:03', 1, '2020-08-20 17:52:03', 1, 269, NULL),
(330, 'Kuvadava Rd, near Green Land Circle, Navagam, Rajkot, Gujarat 360003', 'Kuvadava Rd, near Green Land Circle, Navagam, Rajkot, Gujarat 360003', NULL, '2020-08-20', '18:52:00', NULL, 0, 0, 'webz', 'university rosd, rajkot', '7016811691', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-20 17:53:04', 1, '2020-08-20 17:53:04', 1, 270, NULL),
(331, 'Seasons Hotel', 'Avadh Road, off, Kalavad Rd, Rajkot, Gujarat 360035', NULL, '2020-08-20', '18:55:00', NULL, 0, 0, 'webz', 'delivery address1', '7016811691', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-20 17:56:36', 1, '2020-08-20 17:56:36', 1, 271, NULL),
(332, 'Jaydeep Bhatt', 'nana mauva', '9033348602', '2020-08-21', '09:22:00', NULL, 22.2703186, 70.7609536, 'divyesh', 'Om Nagar, Rajkot', '7016697110', '2020-08-21', '10:20:00', NULL, 'pending', NULL, 1.34, 1.34, 22.2636499, 70.771857, '2020-08-21 08:23:06', 1, '2020-08-21 08:23:06', 1, 272, NULL),
(333, 'Jaydeep Bhatt', 'nana mauva', '9033348602', '2020-08-21', '09:24:00', NULL, 22.2703186, 70.7609536, 'divyesh', 'Om Nagar, Rajkot', '7016697110', '2020-08-21', '10:20:00', NULL, 'pending', NULL, 1.34, 1.34, 22.2636499, 70.771857, '2020-08-21 08:25:58', 1, '2020-08-21 08:25:58', 1, 273, NULL),
(334, 'Jaydeep Bhatt', 'nana mauva', '9033348602', '2020-08-21', '09:29:00', NULL, 22.2703186, 70.7609536, 'divyesh', 'Om Nagar, Rajkot', '7016697110', '2020-08-21', '10:25:00', NULL, 'pending', NULL, 1.34, 1.34, 22.2636499, 70.771857, '2020-08-21 08:30:06', 1, '2020-08-21 08:30:06', 1, 274, NULL),
(335, 'D Mart', 'Kuvadava Rd, near Green Land Circle, Navagam, Rajkot, Gujarat 360003', NULL, '2020-08-21', '10:22:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Om Nagar, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-21 09:16:31', 1, '2020-08-21 09:16:31', 1, 275, NULL),
(336, 'Hansa provision store Rajkot', 'Hansa provision store Rajkot', NULL, '2020-08-21', '10:27:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Om Nagar, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-21 09:22:16', 1, '2020-08-21 09:22:16', 1, 276, NULL),
(337, NULL, 'Hansa provision store Rajkot', NULL, '2020-08-21', '10:35:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Om Nagar, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-21 09:30:05', 1, '2020-08-21 09:30:05', 1, 277, NULL),
(338, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-21', '10:37:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Om Nagar, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-21 09:31:22', 1, '2020-08-21 09:31:22', 1, 278, NULL),
(339, NULL, 'Hansa provision store Rajkot', NULL, '2020-08-21', '11:42:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Om Nagar, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-21 10:37:18', 1, '2020-08-21 10:37:18', 1, 279, NULL),
(340, 'The Grand Thakar', 'Jawahar Rd, Opposite Jubilee Garden, Sadar, Rajkot, Gujarat 360001', NULL, '2020-08-21', '11:50:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Om Nagar, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-21 10:45:03', 1, '2020-08-21 10:45:03', 1, 280, NULL),
(341, 'Ultra fresh', 'ULTRA FRESH OPP.SATYSAI HOSPITEL,SATYSAI MAIN ROAD, Rajkot, Gujarat 360005', NULL, '2020-08-21', '11:56:00', NULL, 0, 0, 'JDB', 'Nanavati Chowk, Satyanarayan park -1 block no. 44, Rajkot', '9033348602', NULL, NULL, 'Send me fast it\'s urgent', 'pending', NULL, 0, 0, 0, 0, '2020-08-21 10:52:05', 1, '2020-08-21 10:52:05', 1, 281, NULL),
(342, NULL, 'Ravi prakashan, Yagnik road, Rajkot', NULL, '2020-08-21', '12:01:00', NULL, 0, 0, 'JDB', 'Nanavati Chowk, Satyanarayan park -1 block no. 44, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-21 10:56:33', 1, '2020-08-21 10:56:33', 1, 282, NULL),
(343, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-21', '12:02:00', NULL, 0, 0, 'JDB', 'University road, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-21 10:57:37', 1, '2020-08-21 10:57:37', 1, 283, NULL),
(344, 'D Mart', 'Kuvadava Rd, near Green Land Circle, Navagam, Rajkot, Gujarat 360003', NULL, '2020-08-21', '12:04:00', NULL, 0, 0, 'JDB', 'Om Nagar ,Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-21 10:59:33', 1, '2020-08-21 10:59:33', 1, 284, NULL),
(345, 'JDB', 'Phulchhab Chowk, Rajkot', '9033348602', '2020-08-21', '12:05:00', NULL, 22.2986881, 70.7941937, 'Divyesh bhai', 'Nanavati Chowk, Satyanarayan park -1 block no. 44, Rajkot', '7016697110', '2020-08-22', '07:05:00', NULL, 'pending', NULL, 4.23, 4.23, 22.283035, 70.756758, '2020-08-21 11:02:10', 1, '2020-08-21 11:02:10', 1, 285, NULL),
(346, NULL, 'ULTRA FRESH OPP.SATYSAI HOSPITEL,SATYSAI MAIN ROAD, Rajkot, Gujarat 360005', NULL, '2020-08-21', '16:44:00', NULL, 0, 0, 'JDB', 'Nanavati Chowk, Satyanarayan park -1 block no. 44, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-21 15:39:25', 1, '2020-08-21 15:39:25', 1, 286, NULL),
(347, 'JDB', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9033348602', '2020-08-21', '17:35:00', NULL, 22.2729455, 70.7565578, 'divyesh', 'Om Nagar ,Rajkot', '7016697110', '2020-08-22', '16:35:00', NULL, 'pending', NULL, 1.88, 1.88, 22.2636499, 70.771857, '2020-08-21 16:31:44', 1, '2020-08-21 16:31:44', 1, 287, NULL),
(348, NULL, 'milapnagar', NULL, '2020-08-21', '18:54:00', NULL, 0, 0, 'hitesh', 'university road', '9825998125', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-21 17:56:00', 1, '2020-08-21 17:56:00', 1, 288, NULL),
(349, 'hitesh', '4, milapnagar,  opp. innovative school,  panchayat chawk,  university road', '9825998125', '2020-08-22', '07:55:00', 'aaaa', 22.2863977, 70.7671884, 'test', 'mahavir nagar, a3, block no 111, raiya road', '7016811691', '2020-08-22', '18:58:00', NULL, 'pending', NULL, 1.71, 1.71, 22.3012399, 70.7627533, '2020-08-21 17:58:46', 1, '2020-08-21 17:58:46', 1, 289, NULL),
(350, 'Ultra fresh', 'ULTRA FRESH OPP.SATYSAI HOSPITEL,SATYSAI MAIN ROAD, Rajkot, Gujarat 360005', NULL, '2020-08-21', '18:58:00', NULL, 0, 0, 'hitesh', 'Rivera wave, kalawad road, rajkot', '9825998125', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-21 17:59:56', 1, '2020-08-21 17:59:56', 1, 290, NULL),
(351, NULL, 'Tirupati Palace,, shop No 1,, Jyoti Nagar, Ghanshyam Nagar Main Rd, Rajkot, Gujarat 360005', NULL, '2020-08-21', '19:00:00', NULL, 0, 0, 'hitesh', 'Rivera wave, kalawad road, rajkot', '9825998125', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-21 18:01:10', 1, '2020-08-21 18:01:10', 1, 291, NULL),
(352, 'Hiteshbhai', 'test', '2208202000', '2020-08-22', '11:10:00', NULL, 0, 0, 'Normal', 'test2', '2208202001', '2020-08-24', '07:05:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-22 08:18:23', 1, '2020-08-22 08:18:23', 1, 292, NULL),
(353, NULL, 'burger king', NULL, '2020-08-22', '09:23:00', NULL, 0, 0, 'Hiteshbhai', 'test3', '2208202000', NULL, NULL, 'need fast', 'pending', NULL, 0, 0, 0, 0, '2020-08-22 08:25:35', 1, '2020-08-22 08:25:35', 1, 293, NULL),
(354, NULL, 'satyam', NULL, '2020-08-22', '09:27:00', NULL, 0, 0, 'Hiteshbhai', 'test4', '2208202000', NULL, NULL, 'need urgent', 'pending', NULL, 0, 0, 0, 0, '2020-08-22 08:29:05', 1, '2020-08-22 08:29:05', 1, 294, NULL),
(355, NULL, 'any where', NULL, '2020-08-22', '09:34:00', NULL, 0, 0, 'kavita', 'test5, near garden', '2208202002', NULL, NULL, 'as early as possible', 'pending', NULL, 0, 0, 0, 0, '2020-08-22 04:12:34', 1, '2020-08-22 08:42:34', 1, 295, NULL),
(356, NULL, 'kanhai', NULL, '2020-08-22', '09:43:00', NULL, 0, 0, 'pris', 'Prius man,  Ravi ratna', '2208202003', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-22 08:46:47', 1, '2020-08-22 08:46:47', 1, 296, NULL),
(357, NULL, 'kanhai', NULL, '2020-08-23', '12:25:00', NULL, 0, 0, 'kavitaben', 'Garden City', '9913744905', NULL, NULL, 'handed over to home of Kavitaben', 'pending', NULL, 0, 0, 0, 0, '2020-08-23 11:28:54', 1, '2020-08-23 11:28:54', 1, 297, NULL),
(358, 'NIRMAL', 'Kanhai, opp abc medical store, sardarnagar main road', '9825790687', '2020-08-24', '09:55:00', 'store 1', 22.2925529, 70.7915709, 'nishi', 'Krishnam, opp old Khadpith, sir Lakhijiraj road', '9824827602', '2020-08-24', '10:50:00', 'store 2', 'pending', NULL, 1.58, 1.58, 22.2977, 70.8058439, '2020-08-24 08:55:40', 1, '2020-08-24 08:55:40', 1, 298, NULL),
(359, 'NIRMAL', 'Kanhai, opp abc medical store, sardarnagar main road', '9825790687', '2020-08-24', '09:56:00', 'home', 22.2925529, 70.7915709, 'Nishi', 'Krishnam, opp old Khadpith, sir Lakhijiraj road', '9824827602', '2020-08-25', '10:55:00', 'home', 'pending', NULL, 1.58, 1.58, 22.2977, 70.8058439, '2020-08-24 08:58:26', 1, '2020-08-24 08:58:26', 1, 299, NULL),
(360, 'NIRMAL', 'kanhai', '9825790687', '2020-08-24', '09:10:00', NULL, 0, 0, 'Krishna', 'Pacific', '7567777994', '2020-08-24', '09:15:00', NULL, 'pending', NULL, 0, 0, -8.783195, -124.508523, '2020-08-24 09:05:42', 1, '2020-08-24 09:05:42', 1, 300, NULL),
(361, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-24', '10:06:00', NULL, 0, 0, 'NIRMAL', 'Kanhai', '9825790687', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-24 09:07:13', 1, '2020-08-24 09:07:13', 1, 301, NULL),
(362, 'Reliance Mall', 'Plot No 2/A, Survey No 30, 150 Feet Ring Rd, Opposite Big Bazaar, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-24', '10:07:00', NULL, 0, 0, 'NIRMAL', 'Kanhai', '9825790687', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-24 09:08:12', 1, '2020-08-24 09:08:12', 1, 302, NULL),
(367, 'Vegetable market', 'Pushkardham Main Rd, AG Society, Rajkot, Gujarat 360005', NULL, '2020-08-24', '10:08:00', NULL, 0, 0, 'NIRMAL', 'kanhai', '9825790687', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-24 09:11:27', 1, '2020-08-24 09:11:27', 1, 307, NULL),
(368, 'Ultra fresh', 'ULTRA FRESH OPP.SATYSAI HOSPITEL,SATYSAI MAIN ROAD, Rajkot, Gujarat 360005', NULL, '2020-08-24', '13:43:00', NULL, 0, 0, 'hitesh', 'mahavir nagar, a3, block no 111, raiya road', '9825998125', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-24 12:43:44', 1, '2020-08-24 12:43:44', 1, 308, NULL),
(369, 'Natural Veggies', '224-225, Jimmy Tower, Opp Swami Narayan Gurukul,, Gondal Rd, Bhakti Nagar, Rajkot, Gujarat 360002', NULL, '2020-08-24', '15:00:00', NULL, 0, 0, 'divyesh', 'Ranchhodnagar', '7016697110', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-24 14:01:39', 1, '2020-08-24 14:01:39', 1, 309, NULL),
(370, 'Reliance Mall', 'Plot No 2/A, Survey No 30, 150 Feet Ring Rd, Opposite Big Bazaar, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-24', '15:02:00', NULL, 0, 0, 'divyesh', 'Ranchoddnagar', '7016697110', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-24 14:03:21', 1, '2020-08-24 14:03:21', 1, 310, NULL),
(371, 'divyesh', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '7016697110', '2020-08-24', '14:00:00', 'nothing', 22.2729455, 70.7565578, 'raj', 'Ranchhodnagar', '9427414702', '2020-08-24', '15:55:00', 'hi', 'pending', NULL, 7.08, 7.08, 22.3087778, 70.8134818, '2020-08-24 14:05:30', 1, '2020-08-24 14:05:30', 1, 311, NULL),
(372, 'Reliance Mall', 'Plot No 2/A, Survey No 30, 150 Feet Ring Rd, Opposite Big Bazaar, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-24', '15:05:00', NULL, 0, 0, 'divyesh', 'Ranchoddnagar', '7016697110', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-24 14:06:21', 1, '2020-08-24 14:06:21', 1, 312, NULL),
(373, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-24', '15:07:00', NULL, 0, 0, 'divyesh', 'Ranchoddnagar', '7016697110', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-24 14:07:58', 1, '2020-08-24 14:07:58', 1, 313, NULL),
(374, NULL, 'Tea Post', NULL, '2020-08-24', '20:38:00', NULL, 0, 0, 'Hiteshkumar', 'Garden City', '9327647270', NULL, NULL, 'Fast', 'pending', NULL, 0, 0, 0, 0, '2020-08-24 19:40:22', 1, '2020-08-24 19:40:22', 1, 314, NULL),
(375, NULL, 'Chandon Store', NULL, '2020-08-24', '20:40:00', NULL, 0, 0, 'Hitesh', 'Star Chambers', '9327647270', NULL, NULL, 'need at office', 'pending', NULL, 0, 0, 0, 0, '2020-08-24 19:41:54', 1, '2020-08-24 19:41:54', 1, 315, NULL),
(376, NULL, 'Any where', NULL, '2020-08-24', '20:42:00', NULL, 0, 0, 'Nirmalbhai', 'Kanhai', '9327647270', NULL, NULL, 'Need at Kanhai', 'pending', NULL, 0, 0, 0, 0, '2020-08-24 19:44:43', 1, '2020-08-24 19:44:43', 1, 316, NULL),
(377, 'Kanhai', 'Jagnath', '7227858557', '2020-08-25', '10:05:00', 'Contact Nishi Mam', 22.2952356, 70.7904399, 'Isha', 'Garden City', '9327647270', '2020-08-25', '11:45:00', 'Handed over at home', 'pending', NULL, 10420.7, 10420.7, -27.5626135, 153.0822254, '2020-08-24 19:50:26', 1, '2020-08-24 19:50:26', 1, 317, NULL),
(378, 'Kanhai', 'Jagnath', '7227858557', '2020-08-25', '10:05:00', 'Contact Nishi Mam', 22.2952356, 70.7904399, 'Isha', 'Garden City', '9327647270', '2020-08-25', '11:45:00', 'Handed over at home', 'pending', NULL, 10420.7, 10420.7, -27.5626135, 153.0822254, '2020-08-24 19:50:26', 1, '2020-08-24 19:50:26', 1, 318, NULL),
(379, 'NIRMAL', 'Kanhai, opp abc medical store, sardarnagar main road', '9825790687', '2020-08-25', '09:15:00', 'home', 22.2925529, 70.7915709, 'Nishi', 'Krishnam, opp old Khadpith, sir Lakhijiraj road', '9824827602', '2020-08-31', '09:15:00', 'shop', 'pending', NULL, 1.58, 1.58, 22.2977, 70.8058439, '2020-08-25 07:20:20', 1, '2020-08-25 07:20:20', 1, 319, NULL),
(380, 'Natural Veggies', '224-225, Jimmy Tower, Opp Swami Narayan Gurukul,, Gondal Rd, Bhakti Nagar, Rajkot, Gujarat 360002', NULL, '2020-08-25', '09:16:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Nanavati chowk, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-25 08:18:19', 1, '2020-08-25 08:18:19', 1, 330, NULL),
(381, 'Natural Veggies', '224-225, Jimmy Tower, Opp Swami Narayan Gurukul,, Gondal Rd, Bhakti Nagar, Rajkot, Gujarat 360002', NULL, '2020-08-25', '09:56:00', NULL, 0, 0, 'JDB', 'Nanavati Chowk, Satyanarayan park -1 block no. 44, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-25 08:56:48', 1, '2020-08-25 08:56:48', 1, 331, NULL),
(382, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-25', '09:57:00', NULL, 0, 0, 'JDB', 'Om Nagar ,Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-25 08:58:24', 1, '2020-08-25 08:58:24', 1, 332, NULL),
(383, 'Reliance Mall', 'Plot No 2/A, Survey No 30, 150 Feet Ring Rd, Opposite Big Bazaar, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-25', '09:58:00', NULL, 0, 0, 'JDB', 'Om Nagar ,Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-25 08:58:57', 1, '2020-08-25 08:58:57', 1, 333, NULL),
(384, NULL, 'Ravi prakashan, Yagnik road, Rajkot', NULL, '2020-08-25', '09:59:00', NULL, 0, 0, 'JDB', 'Om Nagar ,Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-25 08:59:53', 1, '2020-08-25 08:59:53', 1, 334, NULL),
(385, NULL, 'Patel panipuri , Rajkot', NULL, '2020-08-25', '10:04:00', NULL, 0, 0, 'JDB', 'Om Nagar ,Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-25 09:05:13', 1, '2020-08-25 09:05:13', 1, 335, NULL),
(386, 'Natural Veggies', '224-225, Jimmy Tower, Opp Swami Narayan Gurukul,, Gondal Rd, Bhakti Nagar, Rajkot, Gujarat 360002', NULL, '2020-08-25', '10:12:00', NULL, 0, 0, 'dvs', 'Ranchoddnagar', '7016697110', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-25 09:13:38', 1, '2020-08-25 09:13:38', 1, 336, NULL),
(387, NULL, 'Race course Ring road, Rajkot', NULL, '2020-08-25', '11:48:00', NULL, 0, 0, 'jaydeep', 'Nanavati chowk, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-25 10:53:22', 1, '2020-08-25 10:53:22', 1, 337, NULL),
(388, 'Ultra fresh', 'ULTRA FRESH OPP.SATYSAI HOSPITEL,SATYSAI MAIN ROAD, Rajkot, Gujarat 360005', NULL, '2020-08-25', '11:55:00', NULL, 0, 0, 'Jaydeep', 'Nanavati chowk, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-25 10:56:11', 1, '2020-08-25 10:56:11', 1, 338, NULL),
(389, 'Reliance Mall', 'Plot No 2/A, Survey No 30, 150 Feet Ring Rd, Opposite Big Bazaar, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-25', '12:10:00', NULL, 0, 0, 'jaydeep', 'Nanavati chowk, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-25 11:11:53', 1, '2020-08-25 11:11:53', 1, 339, NULL),
(390, 'Ultra fresh', 'ULTRA FRESH OPP.SATYSAI HOSPITEL,SATYSAI MAIN ROAD, Rajkot, Gujarat 360005', NULL, '2020-08-25', '13:55:00', NULL, 0, 0, 'hitesh', 'mahavir nagar, a3, block no 111, raiya road', '9825998125', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-25 12:55:59', 1, '2020-08-25 12:55:59', 1, 340, NULL),
(391, NULL, 'Pizza hut', NULL, '2020-08-26', '00:54:00', NULL, 0, 0, 'Hitesh', 'Garden City', '9327647270', NULL, NULL, 'fast fast', 'pending', NULL, 0, 0, 0, 0, '2020-08-25 23:56:27', 1, '2020-08-25 23:56:27', 1, 341, NULL),
(392, NULL, 'Chandan', NULL, '2020-08-26', '00:58:00', NULL, 0, 0, 'Hitesh', 'sadhu road', '9327647270', NULL, NULL, 'urgent', 'pending', NULL, 0, 0, 0, 0, '2020-08-25 23:59:06', 1, '2020-08-25 23:59:06', 1, 342, NULL),
(393, NULL, 'Any where', NULL, '2020-08-26', '01:00:00', NULL, 0, 0, 'Hitesh', 'Home', '9327647270', NULL, NULL, 'headed over to home', 'pending', NULL, 0, 0, 0, 0, '2020-08-26 00:01:44', 1, '2020-08-26 00:01:44', 1, 343, NULL),
(394, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-26', '09:16:00', NULL, 0, 0, 'jaydeep', 'Nanavati chowk, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-26 08:17:17', 1, '2020-08-26 08:17:17', 1, 344, NULL),
(395, NULL, 'Plot No 2/A, Survey No 30, 150 Feet Ring Rd, Opposite Big Bazaar, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-26', '09:17:00', NULL, 0, 0, 'jaydeep', 'Nanavati chowk, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-26 08:18:39', 1, '2020-08-26 08:18:39', 1, 345, NULL),
(396, 'D Mart', 'Kuvadava Rd, near Green Land Circle, Navagam, Rajkot, Gujarat 360003', NULL, '2020-08-26', '10:25:00', NULL, 0, 0, 'jaydeep', 'Nanavati chowk, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-26 09:26:14', 1, '2020-08-26 09:26:14', 1, 346, NULL),
(397, 'jaydeep', 'Om Nagar, Rajkot', '9033348602', '2020-08-26', '10:41:00', NULL, 22.2636499, 70.771857, 'Jignesh', 'Gondal chowkdi, Rajkot', '7016698110', '2020-08-27', '10:41:00', NULL, 'pending', NULL, 3.74, 3.74, 22.2424733, 70.8001227, '2020-08-26 09:41:53', 1, '2020-08-26 09:41:53', 1, 347, NULL),
(398, 'Seasons Hotel', 'Avadh Road, off, Kalavad Rd, Rajkot, Gujarat 360035', NULL, '2020-08-26', '19:12:00', NULL, 0, 0, 'hitesh', 'milapnagar', '9825998125', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-26 18:13:01', 1, '2020-08-26 18:13:01', 1, 348, NULL),
(399, 'Balaji Super Market', 'Aval Complex, Ground FLoor, University Road, Panchayat Nagar Chowk, Rajkot, Gujarat 360005', NULL, '2020-08-26', '19:15:00', NULL, 0, 0, 'hitesh', 'Rivera wave, kalawad road, rajkot', '9825998125', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-26 18:16:24', 1, '2020-08-26 18:16:24', 1, 349, NULL),
(400, NULL, 'mahavir nagar , street no 5, janak, university road,  rajkot', NULL, '2020-08-26', '19:16:00', NULL, 0, 0, 'hitesh', 'mahavir nagar, a3, block no 111, raiya road', '9825998125', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-26 18:17:10', 1, '2020-08-26 18:17:10', 1, 350, NULL),
(401, 'Kuldevi krupa fruits & vegetable', 'Tirupati Palace,, shop No 1,, Jyoti Nagar, Ghanshyam Nagar Main Rd, Rajkot, Gujarat 360005', NULL, '2020-08-26', '19:17:00', NULL, 0, 0, 'hitesh', 'mahavir nagar, a3, block no 111, raiya road', '9825998125', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-26 18:17:42', 1, '2020-08-26 18:17:42', 1, 351, NULL),
(402, 'Jaydeep', 'Nanavati chowk, Rajkot', '9033348602', '2020-08-27', '15:06:00', NULL, 0, 0, 'Divyesh bhai', 'Om Nagar, Rajkot', '7016697110', '2020-08-28', '15:07:00', NULL, 'pending', NULL, 0, 0, 22.2636499, 70.771857, '2020-08-27 14:07:30', 1, '2020-08-27 14:07:30', 1, 352, NULL),
(403, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-27', '15:08:00', NULL, 0, 0, 'Jaydeep', 'Om Nagar, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-27 14:09:04', 1, '2020-08-27 14:09:04', 1, 353, NULL),
(404, NULL, 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-27', '15:09:00', NULL, 0, 0, 'Jaydeep', 'Om Nagar, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-27 14:09:58', 1, '2020-08-27 14:09:58', 1, 354, NULL),
(405, 'Reliance Mall', 'Plot No 2/A, Survey No 30, 150 Feet Ring Rd, Opposite Big Bazaar, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-27', '15:10:00', NULL, 0, 0, 'Jaydeep', 'Om Nagar, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-27 14:10:40', 1, '2020-08-27 14:10:40', 1, 355, NULL),
(406, 'Natural Veggies', '224-225, Jimmy Tower, Opp Swami Narayan Gurukul,, Gondal Rd, Bhakti Nagar, Rajkot, Gujarat 360002', NULL, '2020-08-27', '15:10:00', NULL, 0, 0, 'Jaydeep', 'Om Nagar, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-27 14:11:16', 1, '2020-08-27 14:11:16', 1, 356, NULL),
(407, 'jaydeep bhatt', 'Nanavati chowk, Rajkot', '9033348602', '2020-08-27', '18:10:00', NULL, 22.3054267, 70.7684229, 'Divyesh bhai', 'Om Nagar, Rajkot', '7016697110', '2020-08-28', '17:13:00', NULL, 'pending', NULL, 4.64, 4.64, 22.2636499, 70.771857, '2020-08-27 16:15:16', 1, '2020-08-27 16:15:16', 1, 357, NULL),
(408, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-27', '17:18:00', NULL, 0, 0, 'Jaydeep bhatt', 'Nanavati chowk, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-27 16:20:25', 1, '2020-08-27 16:20:25', 1, 358, NULL),
(409, 'Reliance Mall', 'Plot No 2/A, Survey No 30, 150 Feet Ring Rd, Opposite Big Bazaar, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-27', '17:34:00', NULL, 0, 0, 'jaydeep bhatt', 'Om Nagar, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-27 16:34:56', 1, '2020-08-27 16:34:56', 1, 359, NULL),
(410, 'Natural Veggies', '224-225, Jimmy Tower, Opp Swami Narayan Gurukul,, Gondal Rd, Bhakti Nagar, Rajkot, Gujarat 360002', NULL, '2020-08-27', '17:38:00', NULL, 0, 0, 'jaydeep bhatt', 'Om Nagar, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-27 16:39:01', 1, '2020-08-27 16:39:01', 1, 360, NULL),
(411, NULL, '224-225, Jimmy Tower, Opp Swami Narayan Gurukul,, Gondal Rd, Bhakti Nagar, Rajkot, Gujarat 360002', NULL, '2020-08-27', '17:42:00', NULL, 0, 0, 'jaydeep bhatt', 'Nanavati chowk, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-27 16:43:09', 1, '2020-08-27 16:43:09', 1, 361, NULL),
(412, NULL, 'Nanavati chowk, Rajkot', NULL, '2020-08-27', '17:57:00', NULL, 0, 0, 'jaydeep bhatt', 'Om Nagar, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-27 17:00:12', 1, '2020-08-27 17:00:12', 1, 362, NULL),
(413, NULL, 'Sankalp', NULL, '2020-08-28', '13:27:00', NULL, 0, 0, 'Hiteshgiri', 'Garden City', '9327647270', NULL, NULL, 'Hot food otherwise return.', 'pending', NULL, 0, 0, 0, 0, '2020-08-28 12:29:14', 1, '2020-08-28 12:29:14', 1, 363, NULL),
(414, NULL, 'Dmart', NULL, '2020-08-28', '13:30:00', NULL, 0, 0, 'Hitesh', 'jaliyan', '9327647270', NULL, NULL, 'we are at Julian\'s. send here.', 'pending', NULL, 0, 0, 0, 0, '2020-08-28 12:31:00', 1, '2020-08-28 12:31:00', 1, 364, NULL),
(415, NULL, 'Any where', NULL, '2020-08-28', '13:32:00', NULL, 0, 0, 'Hitesh', 'Kanhai', '9327647270', NULL, NULL, 'pl deliver at Kangaroo.', 'pending', NULL, 0, 0, 0, 0, '2020-08-28 12:33:03', 1, '2020-08-28 12:33:03', 1, 365, NULL),
(416, 'Shakti Veg Shop', 'Raj Palace Opp. Nakshatra-5, Sadhu Vaswani Road, Yogi Nagar, Rajkot, Gujarat 360005', NULL, '2020-08-28', '13:36:00', NULL, 0, 0, 'hitesh', 'mahavir nagar, a3, block no 111, raiya road', '9825998125', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-28 12:36:50', 1, '2020-08-28 12:36:50', 1, 366, NULL),
(417, NULL, 'garden villa, sadhuvasvani road, nr raiya road, rajkot', NULL, '2020-08-28', '13:37:00', NULL, 0, 0, 'hitesh', 'Rivera wave, kalawad road, rajkot', '9825998125', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-28 12:38:25', 1, '2020-08-28 12:38:25', 1, 367, NULL),
(418, NULL, 'Netri', NULL, '2020-08-28', '13:45:00', NULL, 0, 0, 'Hiteshbhai', 'Garden', '9327647270', NULL, NULL, 'no mix', 'pending', NULL, 0, 0, 0, 0, '2020-08-28 12:58:42', 1, '2020-08-28 12:58:42', 1, 368, NULL),
(419, NULL, 'Shiv Ganthya , Raiya chowkdi, Rajkot', NULL, '2020-08-28', '15:01:00', NULL, 0, 0, 'jaydeep bhatt', 'Om Nagar, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-28 14:02:02', 1, '2020-08-28 14:02:02', 1, 369, NULL),
(420, NULL, 'Shiv Ganthya , Raiya chowkdi, Rajkot', NULL, '2020-08-28', '15:27:00', NULL, 0, 0, 'jaydeep bhatt', 'Om Nagar, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-28 14:27:30', 1, '2020-08-28 14:27:30', 1, 370, NULL),
(421, NULL, 'Shiv gathiya, Raiya chowkdi, Rajkot', NULL, '2020-08-28', '15:54:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Om Nagar, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-28 14:55:35', 1, '2020-08-28 14:55:35', 1, 371, NULL),
(422, NULL, 'Ravi Prakashan, Rajkot', NULL, '2020-08-28', '16:15:00', NULL, 0, 0, 'Jaydeep Bhatt', 'Om Nagar, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-28 15:16:04', 1, '2020-08-28 15:16:04', 1, 372, NULL),
(423, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-28', '16:18:00', NULL, 0, 0, 'Jaydeep', 'Om Nagar, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-28 15:19:24', 1, '2020-08-28 15:19:24', 1, 373, NULL),
(424, NULL, 'Ravi Prakashan, Rajkot', NULL, '2020-08-28', '16:19:00', NULL, 0, 0, 'Jaydeep', 'Om Nagar, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-28 15:20:21', 1, '2020-08-28 15:20:21', 1, 374, NULL),
(425, NULL, 'Golden super market, Rajkot', NULL, '2020-08-28', '16:21:00', NULL, 0, 0, 'Jaydeep', 'Om Nagar, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-28 15:21:57', 1, '2020-08-28 15:21:57', 1, 375, NULL),
(426, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-28', '17:09:00', NULL, 0, 0, 'jaydeep Bhatt', 'Om Nagar, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-28 16:09:49', 1, '2020-08-28 16:09:49', 1, 376, NULL),
(427, NULL, 'Nanavati chowk, Rajkot', NULL, '2020-08-28', '17:10:00', NULL, 0, 0, 'jaydeep Bhatt', 'Om Nagar, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-28 16:10:41', 1, '2020-08-28 16:10:41', 1, 377, NULL),
(428, 'Reliance Mall', 'Plot No 2/A, Survey No 30, 150 Feet Ring Rd, Opposite Big Bazaar, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-28', '17:11:00', NULL, 0, 0, 'jaydeep Bhatt', 'Om Nagar, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-28 16:11:24', 1, '2020-08-28 16:11:24', 1, 378, NULL),
(429, NULL, 'Ravi Prakashan, Rajkot', NULL, '2020-08-28', '17:11:00', NULL, 0, 0, 'jaydeep Bhatt', 'Om Nagar, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-28 16:12:03', 1, '2020-08-28 16:12:03', 1, 379, NULL),
(430, 'Natural Veggies', '224-225, Jimmy Tower, Opp Swami Narayan Gurukul,, Gondal Rd, Bhakti Nagar, Rajkot, Gujarat 360002', NULL, '2020-08-28', '17:12:00', NULL, 0, 0, 'jaydeep Bhatt', 'Om Nagar, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-28 16:12:59', 1, '2020-08-28 16:12:59', 1, 380, NULL),
(431, NULL, 'Sbji bazaar, jyubeli, rajkot', NULL, '2020-08-28', '17:13:00', NULL, 0, 0, 'jaydeep Bhatt', 'Om Nagar, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-28 16:13:52', 1, '2020-08-28 16:13:52', 1, 381, NULL),
(432, NULL, 'Karan para , Rajkot', NULL, '2020-08-28', '17:14:00', NULL, 0, 0, 'jaydeep Bhatt', 'Om Nagar, Rajkot', '9033348602', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-28 16:15:12', 1, '2020-08-28 16:15:12', 1, 382, NULL),
(433, 'jaydeep Bhatt', 'Nanavati chowk, Rajkot', '9033348602', '2020-08-28', '17:18:00', NULL, 0, 0, 'Divyesh bhai', 'Om Nagar, Rajkot', '7016697110', '2020-08-29', '17:18:00', NULL, 'pending', NULL, 0, 0, 22.2636499, 70.771857, '2020-08-28 16:19:12', 1, '2020-08-28 16:19:12', 1, 383, NULL),
(434, NULL, 'Jawahar Rd, Opposite Jubilee Garden, Sadar, Rajkot, Gujarat 360001', NULL, '2020-08-28', '19:12:00', NULL, 0, 0, 'hitesh', 'mahavir nagar, a3, block no 111, raiya road', '9825998125', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-28 18:12:45', 1, '2020-08-28 18:12:45', 1, 384, NULL),
(435, 'The Grand Thakar', 'Jawahar Rd, Opposite Jubilee Garden, Sadar, Rajkot, Gujarat 360001', NULL, '2020-08-28', '19:13:00', NULL, 0, 0, 'hitesh', 'mahavir nagar, a3, block no 111, raiya road', '9825998125', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-28 18:14:03', 1, '2020-08-28 18:14:03', 1, 385, NULL),
(436, 'hitesh', 'Tirupati Palace,, shop No 1,, Jyoti Nagar, Ghanshyam Nagar Main Rd, Rajkot, Gujarat 360005', '9825998125', '2020-08-29', '16:15:00', NULL, 22.2818652, 70.7611615, 'r', 'milapnagar', '4679487546', '2020-08-29', '19:16:00', NULL, 'pending', NULL, 945.73, 945.73, 28.6225478, 77.0632821, '2020-08-28 18:17:05', 1, '2020-08-28 18:17:05', 1, 386, NULL),
(437, 'D Mart', 'Crystal Mall L-B1 Kalavad Road Opp. Rani Tower, Sadguru Nagar, Rajkot, Gujarat 360005', NULL, '2020-08-28', '19:18:00', NULL, 0, 0, 'hitesh', 'Rivera wave, kalawad road, rajkot', '9825998125', NULL, NULL, 'need at everything time', 'pending', NULL, 0, 0, 0, 0, '2020-08-28 18:18:43', 1, '2020-08-28 18:18:43', 1, 387, NULL),
(438, NULL, 'Sankalp', NULL, '2020-08-28', '22:06:00', NULL, 0, 0, 'Hitesh', 'Garden', '9327647270', NULL, NULL, 'Fast', 'pending', NULL, 0, 0, 0, 0, '2020-08-28 21:06:37', 1, '2020-08-28 21:06:37', 1, 388, NULL),
(439, 'hitesh', 'test', '9825998125', '2020-08-29', '11:05:00', NULL, 0, 0, 'abc', 'abc', '4678457574', '2020-08-29', '12:55:00', NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-29 08:09:38', 1, '2020-08-29 08:09:38', 1, 389, NULL),
(440, NULL, 'abc', NULL, '2020-08-29', '09:12:00', NULL, 0, 0, 'hitesh', 'est', '9825998125', NULL, NULL, 'aaaaaaaa', 'pending', NULL, 0, 0, 0, 0, '2020-08-29 08:12:42', 1, '2020-08-29 08:12:42', 1, 390, NULL),
(441, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', NULL, '2020-08-29', '10:16:00', NULL, 0, 0, 'Hitesh', 'Om Nagar, Rajkot', '9327647270', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-29 09:16:46', 1, '2020-08-29 09:16:46', 1, 391, NULL),
(442, 'Hitesh', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', '9327647270', '2020-08-29', '11:28:00', NULL, 0, 0, 'Jaydeep bhai', 'Om Nagar, Rajkot', '9033348602', '2020-08-30', '11:28:00', NULL, 'pending', NULL, 0, 0, 22.2636499, 70.771857, '2020-08-29 10:28:56', 1, '2020-08-29 10:28:56', 1, 392, NULL),
(443, 'Balaji Super Market', 'Aval Complex, Ground FLoor, University Road, Panchayat Nagar Chowk, Rajkot, Gujarat 360005', NULL, '2020-08-29', '11:35:00', NULL, 0, 0, 'Hitesh', 'Om Nagar, Rajkot', '9327647270', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-29 10:35:57', 1, '2020-08-29 10:35:57', 1, 393, NULL),
(444, 'Natural Veggies', '224-225, Jimmy Tower, Opp Swami Narayan Gurukul,, Gondal Rd, Bhakti Nagar, Rajkot, Gujarat 360002', NULL, '2020-08-29', '11:36:00', NULL, 0, 0, 'Hitesh', 'Om Nagar, Rajkot', '9327647270', NULL, NULL, NULL, 'pending', NULL, 0, 0, 0, 0, '2020-08-29 10:36:23', 1, '2020-08-29 10:36:23', 1, 394, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `title`) VALUES
(1, 'Pending'),
(2, 'delivered'),
(3, 'complete'),
(4, 'Deleted');

-- --------------------------------------------------------

--
-- Table structure for table `order_type`
--

CREATE TABLE `order_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `default_price` double DEFAULT NULL,
  `status` enum('Enable','Disable') NOT NULL DEFAULT 'Enable',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_type`
--

INSERT INTO `order_type` (`id`, `name`, `description`, `default_price`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Up to 1 kg', 'Up to 1 kg', NULL, 'Enable', '2020-06-26 17:55:03', 1, '2020-06-26 17:55:03', 1),
(2, 'Up to 5 kg', 'Up to 5 kg', NULL, 'Enable', '2020-06-26 17:55:24', 1, '2020-06-26 17:55:24', 1),
(3, 'Up to 10 kg', 'Up to 10 kg', NULL, 'Enable', '2020-06-26 17:55:41', 1, '2020-06-26 17:55:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_update_log`
--

CREATE TABLE `order_update_log` (
  `id` int(11) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `double_google_order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_update_log`
--

INSERT INTO `order_update_log` (`id`, `remark`, `double_google_order_id`, `user_id`) VALUES
(1, 'Deleted', 99, 1),
(2, 'adaaddad', 94, 1),
(3, 'delete testing', 127, 1),
(4, NULL, 161, 1),
(5, NULL, 160, 1),
(6, 'test', 192, 1),
(7, NULL, 186, 1),
(8, 'iiolioiiolil', 185, 1),
(9, 'for testing', 273, 1),
(10, 'for testing', 272, 1),
(11, 'test', 276, 1),
(12, 'test', 275, 1),
(13, 'test', 293, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_status`
--

CREATE TABLE `payment_status` (
  `id` int(10) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `status` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `id` int(10) UNSIGNED NOT NULL,
  `start_km` int(11) NOT NULL,
  `end_km` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`id`, `start_km`, `end_km`, `price`) VALUES
(1, 0, 3, 49),
(2, 3, 100, 999);

-- --------------------------------------------------------

--
-- Table structure for table `promo_code`
--

CREATE TABLE `promo_code` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `applicable_city` text DEFAULT NULL,
  `applicable_pincode` text DEFAULT NULL,
  `promo_type` enum('percentage','fixed_price') NOT NULL DEFAULT 'fixed_price',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

CREATE TABLE `remarks` (
  `id` int(11) NOT NULL,
  `double_google_order_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `remarks`
--

INSERT INTO `remarks` (`id`, `double_google_order_id`, `user_id`, `remark`, `created_at`, `updated_at`) VALUES
(1, 285, 1, 'urgent order delivery required', '2020-08-21 12:52:53', '2020-08-21 16:05:02'),
(2, 284, 1, 'order priority high', '2020-08-21 12:57:21', '2020-08-21 16:04:00'),
(3, 296, 1, 'test', '2020-08-23 17:58:21', '2020-08-23 17:58:21'),
(4, 313, 1, 'urgent', '2020-08-24 16:24:11', '2020-08-24 16:24:11'),
(5, 339, 1, 'Confirm', '2020-08-25 14:34:42', '2020-08-25 14:34:42'),
(6, 339, 1, 'Out for deliver', '2020-08-25 17:02:15', '2020-08-25 17:02:15'),
(7, 382, 1, 'S', '2020-08-28 17:18:38', '2020-08-28 17:18:38'),
(8, 402, 1, 'confirm', '2020-08-31 16:09:36', '2020-08-31 16:09:36'),
(9, 402, 1, 'remark testing', '2020-08-31 16:15:26', '2020-08-31 16:15:26'),
(10, 393, 1, '54', '2020-10-05 10:47:28', '2020-10-05 10:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `sending_item`
--

CREATE TABLE `sending_item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sending_item`
--

INSERT INTO `sending_item` (`id`, `name`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Documents', NULL, '2020-06-26 17:57:10', 1, '2020-06-26 17:57:10', 1),
(2, 'Groceries', NULL, '2020-06-26 17:57:55', 1, '2020-06-26 17:57:55', 1),
(3, 'Present', NULL, '2020-06-26 17:58:26', 1, '2020-06-26 17:58:26', 1),
(4, 'Flowers', NULL, '2020-06-26 17:58:37', 1, '2020-06-26 17:58:37', 1),
(5, 'Mix', NULL, '2020-07-31 09:00:12', 1, '2020-07-31 09:00:12', 1),
(6, 'Others', NULL, '2020-06-26 17:58:50', 1, '2020-06-26 17:58:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `store_or_restaurant`
--

CREATE TABLE `store_or_restaurant` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `adddress` varchar(255) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `type` enum('store','restaurant','medical','vegetable') DEFAULT NULL,
  `open_time` time DEFAULT NULL,
  `close_time` time DEFAULT NULL,
  `close_day` enum('Mon','Tue','Wed','Thu','Fri','Sat','Sun') DEFAULT NULL,
  `status` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_or_restaurant`
--

INSERT INTO `store_or_restaurant` (`id`, `name`, `adddress`, `city_id`, `notes`, `logo`, `type`, `open_time`, `close_time`, `close_day`, `status`) VALUES
(1, 'Reliance Mall', 'Plot No 2/A, Survey No 30, 150 Feet Ring Rd, Opposite Big Bazaar, Nana Mava, Rajkot, Gujarat 360005', 1, NULL, 'b90bcab797eb21b8f8515d9499aea24f.jpg', 'store', '10:00:00', '20:00:00', NULL, 'Y'),
(2, 'D Mart', 'Kuvadava Rd, near Green Land Circle, Navagam, Rajkot, Gujarat 360003', 1, 'It is a store', '90f0cd6439a852ee6b0de83d4e4249b2.png', 'store', '00:00:00', '08:00:00', NULL, 'Y'),
(3, 'D Mart', 'Crystal Mall L-B1 Kalavad Road Opp. Rani Tower, Sadguru Nagar, Rajkot, Gujarat 360005', 1, 'It is a store', '77d6774f09e73d21f77ca97201b63dc4.png', 'store', '00:00:00', '08:00:00', NULL, 'Y'),
(4, 'McDonald\'s', 'Ground & 1st Floor, Jupiter Atrium Everest Park, next to Royal Enfield Showroom, Nana Mava, Rajkot, Gujarat 360005', 1, 'It is a restaurant', '409fbdbc386c2e699d25d85cc51eb8cd.png', 'restaurant', '00:00:00', '08:00:00', NULL, 'Y'),
(5, 'The Grand Thakar', 'Jawahar Rd, Opposite Jubilee Garden, Sadar, Rajkot, Gujarat 360001', 1, 'It is a restaurant', 'a98419bcb43c99d22ab6d2c30154aa66.jpg', 'restaurant', '00:00:00', '08:00:00', NULL, 'Y'),
(6, 'Seasons Hotel', 'Avadh Road, off, Kalavad Rd, Rajkot, Gujarat 360035', 1, 'It is a restaurant', 'b4107034bb1b885f52edf9771e59df8b.jpg', 'restaurant', '00:00:00', '08:00:00', '', 'Y'),
(7, 'The Grand Murlidhar TGM', 'Jamnagar - Rajkot Hwy, Naranka, Gujarat 360110', 1, 'It is a restaurant', 'b4107034bb1b885f52edf9771e59df8b.jpg', 'restaurant', '00:00:00', '08:00:00', '', 'Y'),
(8, 'Apple Bite', '4 Plus Complex, Sardar Nagar Main Rd, Astron Chowk, Near, Sardarnagar, Rajkot, Gujarat 360001', 1, 'It is a restaurant', 'b4107034bb1b885f52edf9771e59df8b.jpg', 'restaurant', '00:00:00', '08:00:00', '', 'Y'),
(9, 'Adingo Foods', 'Subhash Road, Limda Chowk, Near, Sadar, Rajkot, Gujarat 360002', 1, 'It is a restaurant', 'b4107034bb1b885f52edf9771e59df8b.jpg', 'restaurant', '00:00:00', '08:00:00', '', 'Y'),
(10, 'Jitesh Medical Store', 'Murlidhar Chambers, Kuvadava Rd, Opp. Ranchhoddas Ji Ashram, Bhagvati Park, Patel Nagar, Arya Nagar, Rajkot, Gujarat 360003', 1, 'It is medical', 'f8c04952fef9dc15cef69ebc893310fb.jpg', 'medical', '00:00:00', '08:00:00', NULL, 'Y'),
(11, 'Maruti Medical Shop', 'Opp. Nagrik Bank, Deluxe Cinema Chowk, Bedipara, Rajkot, Gujarat 360003', 1, 'It is medical', 'b4107034bb1b885f52edf9771e59df8b.jpg', 'medical', '00:00:00', '08:00:00', '', 'Y'),
(12, 'Vikas Medical Store', 'Sardar Nagar Main Road, Astron Chowk, Sardarnagar, Rajkot, Gujarat 360001', 1, 'It is medical', 'b4107034bb1b885f52edf9771e59df8b.jpg', 'medical', '00:00:00', '08:00:00', '', 'Y'),
(13, 'New Bajrang medical store', 'Jay javan Jay kisan main road, Nr. moebi Octry naka, Rajkot, Rajkot, Gujarat 360003', 1, 'It is medical', 'b4107034bb1b885f52edf9771e59df8b.jpg', 'medical', '00:00:00', '08:00:00', '', 'Y'),
(14, 'Bhavesh Medical Store', 'Jaubali Trade Centre, Jawahar Road, Jawahar Road, Rajkot, Gujarat 360001', 1, 'It is medical', '0423e9e821ff9c21abc73589626ec7d3.jpg', 'medical', '00:00:00', '08:00:00', NULL, 'Y'),
(15, 'Shivumang Medical Store', 'Ranchod Nagar 4/19, Opp.Corner Kaveri Apartment, Ranchod Nagar Society, Arya Nagar, Rajkot, Gujarat 360003', 1, 'It is medical', '30fef0d6dff370dcbb4326f7e6584a3f.jpg', 'medical', '00:00:00', '08:00:00', NULL, 'Y'),
(16, 'Bhartiy Jan Aushadhi Store', 'Canal Rd, Lakshmiwadi, Bhakti Nagar, Rajkot, Gujarat 360001', 1, 'It is medical', 'ca8d3ca4c808f58d7e8e9086ac16f963.jpg', 'medical', '00:00:00', '08:00:00', NULL, 'Y'),
(17, 'Chandan Super market', 'Trisha Complex, Amin Marg, Rajkot, Gujarat 360001', 1, 'Chandan Super market', '0279e7d55a35d0c37dbb66b528cf85e4.jpg', 'store', '07:00:00', '20:00:00', 'Sun', 'Y'),
(18, 'Golden Super Market', 'Shop No. 11 to 18, Madhav Vatika, Sojitranagar Main Rd, Behind Nirmala Convent School, Madhav Vatika, Nagrik Bank Society, Gulab Nagar, Rajkot, Gujarat 360005', 1, NULL, '3319214f160f237d9a5af25022915624.jpg', 'store', '10:00:00', '20:00:00', 'Sun', 'Y'),
(19, 'Balaji Super Market', 'Aval Complex, Ground FLoor, University Road, Panchayat Nagar Chowk, Rajkot, Gujarat 360005', 1, NULL, '3c988b3a319820717f2d312302a14190.jpg', 'store', '10:00:00', '20:00:00', 'Sun', 'Y'),
(20, 'Pick N Pack', 'Sardar Nagar Main Rd, near poojara telecom, Sardarnagar, Rajkot, Gujarat 360001', 1, NULL, '99420397798c3ed23d5e73373998a386.jpg', 'store', '10:00:00', '20:00:00', 'Sun', 'Y'),
(21, 'Natural Veggies', '224-225, Jimmy Tower, Opp Swami Narayan Gurukul,, Gondal Rd, Bhakti Nagar, Rajkot, Gujarat 360002', 1, NULL, '6a05045161ce45f525204d20b711d08d.jpg', 'vegetable', '10:00:00', '20:00:00', 'Sun', 'Y'),
(22, 'Ultra fresh', 'ULTRA FRESH OPP.SATYSAI HOSPITEL,SATYSAI MAIN ROAD, Rajkot, Gujarat 360005', 1, NULL, '94c49ffb34bf17abefe5605e8d25c9d8.jpg', 'vegetable', '10:00:00', '20:00:00', 'Sun', 'Y'),
(23, 'Shakti Veg Shop', 'Raj Palace Opp. Nakshatra-5, Sadhu Vaswani Road, Yogi Nagar, Rajkot, Gujarat 360005', 1, NULL, 'ab3efe7117ccc8ab4ae4ed2f52dad169.jpg', 'vegetable', '10:00:00', '20:00:00', NULL, 'Y'),
(24, 'Kuldevi krupa fruits & vegetable', 'Tirupati Palace,, shop No 1,, Jyoti Nagar, Ghanshyam Nagar Main Rd, Rajkot, Gujarat 360005', 1, NULL, 'df8bd094a383840245e712269b3f54db.jpg', 'vegetable', '10:00:00', '20:00:00', 'Sun', 'Y'),
(25, 'Jai Jalaram Fruits Store', 'Veg Market Chok, Dharmendra Road, Dharmendra Road, Rajkot, Gujarat 360001', 1, NULL, '49449a8989a18e40ca8770171d62122e.jpg', 'vegetable', '10:00:00', '20:00:00', 'Sun', 'Y'),
(26, 'Vegetable market', 'Pushkardham Main Rd, AG Society, Rajkot, Gujarat 360005', 1, NULL, '4fc05b4f10f0845389ecfb54833c973d.jpg', 'vegetable', '10:00:00', '20:00:00', NULL, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cc-email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp_mobile` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `cc-email`, `mobile`, `whatsapp_mobile`, `facebook`, `instagram`, `twitter`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'order@callat7.com', NULL, '9825790687', '9825790687', NULL, NULL, NULL, '$2y$10$9I4FWEfuWHNbqXuNhdkbAu8WMrkKmhTgAQ2JSXEeMgJHkR6bM1a2G', 'Y', '497RtUstiNBO4VP5gVS40NEtYAqcoNd2szoygGYoivSKPaBLAceOboyA01LK', NULL, '2020-09-17 11:28:14'),
(2, 'Divyesh Patel', '149dvs@gmail.com', NULL, '7016697110', NULL, NULL, NULL, NULL, '$2y$10$bRR11.FQji0mlhpbceVW7eYZTaT90Yygm1p9GwqPiaf8Cp8pDlD0e', 'N', NULL, '2020-09-17 11:55:42', '2020-09-17 11:55:52');

-- --------------------------------------------------------

--
-- Table structure for table `user_device_detail`
--

CREATE TABLE `user_device_detail` (
  `id` int(11) NOT NULL,
  `device_id` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `device_type` enum('android','iphone') DEFAULT NULL,
  `device_version` varchar(255) DEFAULT NULL,
  `fcm_key` varchar(255) DEFAULT NULL,
  `manfacturer` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_device_detail`
--

INSERT INTO `user_device_detail` (`id`, `device_id`, `mobile_number`, `device_type`, `device_version`, `fcm_key`, `manfacturer`, `user_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '6', '', 'android', '6', '5', '', 25, 25, 25, '2020-07-10 03:48:56', '2020-07-10 03:48:56'),
(2, '6', '', 'android', '6', '5', '', 26, 26, 26, '2020-07-10 04:52:36', '2020-07-10 04:52:36'),
(3, '3318101cc6480055', '', 'android', '8.0.0', 'dBgi4JahTVmsHn213eACNj:APA91bG8juC3Smdl8_4749CRmA1SYsFzdolFhGggb8bj844I-A9oRNLOrj9hiiqfkWNXLvT_aYwXuNwIY_kpZX1VnnrXG6eFdDrdAqWdbjf5RgO46Zj3if18l4wmilLRXgKj7KJ_V6SB', '', 27, 27, 27, '2020-07-10 06:52:53', '2020-07-10 06:52:53'),
(4, '3318101cc6480055', '', 'android', '8.0.0', 'dBgi4JahTVmsHn213eACNj:APA91bG8juC3Smdl8_4749CRmA1SYsFzdolFhGggb8bj844I-A9oRNLOrj9hiiqfkWNXLvT_aYwXuNwIY_kpZX1VnnrXG6eFdDrdAqWdbjf5RgO46Zj3if18l4wmilLRXgKj7KJ_V6SB', '', 28, 28, 28, '2020-07-10 10:59:56', '2020-07-10 10:59:56'),
(5, 'f46241375216a7a9', '', 'android', '10', 'c33q0y1XT36C-5I15Rlh6x:APA91bHQfV8vfHtIgomvTWrfLRkJ3k5H6podYnMGCPvjdXMmBX50oDzAy_0uGTwKKCmCe-ViB7Y3qpQdAuQ0hqRJyqJRljgGFrEi0V-gPRzP0Inmc_k5j35iqrD1oOHfp7x-aFHn-1NP', '', 29, 29, 29, '2020-07-13 10:39:51', '2020-07-13 10:39:51'),
(6, '6', '', 'android', '6', '5', '', 30, 30, 30, '2020-07-13 10:40:13', '2020-07-13 10:40:13'),
(7, 'b40da31a09304909', '', 'android', '8.1.0', 'cS-7PtkrQLCR11CFr_VR-i:APA91bHYecGfda4P7XqlSjn4HinNoOu1N6hn6sbepfr3EiYljV_bsrAaBnw_4pap50pFIY8rjsl9fAu_DQ_w6y2dB2UMEz4OKLznF3LL7y35IQJLHQ9KiajA5_OdtJHRbdCnLr1Yldj3', '', 31, 31, 31, '2020-07-13 16:44:16', '2020-07-13 16:44:16'),
(8, '6', '', 'android', '6', '5', '', 32, 32, 32, '2020-07-14 05:09:43', '2020-07-14 05:09:43'),
(9, '6', '', 'android', '6', '5', '', 34, 34, 34, '2020-07-14 05:59:06', '2020-07-14 05:59:06'),
(10, '6', '', 'android', '6', '5', '', 35, 35, 35, '2020-07-14 05:59:59', '2020-07-14 05:59:59'),
(11, '6', '', 'android', '6', '5', '', 36, 36, 36, '2020-07-14 06:13:52', '2020-07-14 06:13:52'),
(12, '64c140fc93f984e4', '', 'android', '8.1.0', 'cvAanxDWQVGDXAYSBxJrsL:APA91bH2TkAZAOcSOG_qTIzUmxMI_G1KlmGYj5s4UX7tzmWDF5tRA_VVLUYZatAg8IyNyYVcJUkMgtgCLaC9v4rRppYN559E12TLDM2fDuagdW_r5Qw4fuLBeH_-nwsV-hnamG_Cr2k6', '', 37, 37, 37, '2020-07-14 06:22:07', '2020-07-30 14:40:56'),
(13, '79b029c142177017', '9825998125', 'android', '10', 'e6OiS_DwRxe2tOuaczkJvX:APA91bFvSuejXi1GXHkwFzQbVefQeUclfrrHnwrXWW2pDQoQH70f6WWIU_10ccE2VgUDXHFRsYbWWUmg18Tj0kQ19DKQqGl8r0JAL1HKt8A1aijDefvuVCMKubukl7ykx6sJIiy3lEIM', '', 38, 38, 38, '2020-07-14 06:23:15', '2020-09-01 12:33:31'),
(14, 'b40da31a09304909', '0108202004', 'android', '8.1.0', 'diyELVPtRxSm_q11lbDNtj:APA91bH08b5iUXzTNJBt14EgV5U6ZIG7F1R2qVJk2w4dhGqGrR6X0qKaYOj7y8v85utmcKtm4esfV4jk_8ocW3mVJOZT-mAx4DWgfJfe2DIYkD6JXFReD9zplXK5Wfu-oXrQvbgtk5hY', '', 41, 41, 41, '2020-07-14 07:26:36', '2020-08-01 12:29:49'),
(15, 'b40da31a09304909', '0108202013', 'android', '8.1.0', 'cqjgQNwqQlO5A8WeMtD4ud:APA91bFUD7DhEqTS34JPn_EVRquW7ikMfpRh6sW5jfZjsA6iKB6jg10y3tXFgewNXfXVAGsnw_rl2POMuUSgirvhLa8pAzwXW9zdMM8Goli_IAzOiBkWjZiyg5CYfz1dSMSprGUznnOx', '', 42, 42, 42, '2020-07-14 09:24:38', '2020-08-01 13:01:20'),
(16, '11414c704904c019', '', 'android', '9', 'exaNRjEfSD-LUEpC14QZRA:APA91bEG1kPAtHzzjNIn3ARm4Ouw2X4O_r1BmD0nFHo0D0r0st1arE4yrY49pBSdooTnWFjsK8R9MGKmlmt471xKHRiQN2B06JZsuy9-b016dC45_wKZNhRQfvjcPnJKzvczryuzd_EB', '', 43, 43, 43, '2020-07-14 09:25:53', '2020-08-05 15:27:09'),
(17, '03cc4e1be00a5970', '7016697110', 'android', '9', 'fmBRUkwBTSKmKsXN4N9hwB:APA91bFLQvF2Rkj-TwL0VeD48x5J7i5imTI9VPA2hvKt5o1r5b854JwU0AEj2tSBzmvwp6a7ohw53JwvdEz8QQZP41WRe1S-4njm-DM8bMwwMhnpU_eFTeDre1CXbjH4A6V1Q7_Ltvjc', '', 44, 44, 44, '2020-07-14 09:27:38', '2020-08-25 09:13:38'),
(18, '152a3839a9c2b926', '7567777994', 'android', '10', 'dH4vveXAQp-Tw7q3B_CjtS:APA91bH4TJ-beN_Q2I1c7NpJ6qM7OQawBm5CRsB6NultjAtgAcDIer4pquQSBQprEbDWn4R5UJyWsmnrF31i-y6OnRzLlL4n_QPChVblQJu4tlap7eh0xKeor7eN3xBU5kXbge1Bb2Sr', '', 45, 45, 45, '2020-07-14 09:29:43', '2020-08-09 10:12:25'),
(19, '152a3839a9c2b926', '1408202000', 'android', '10', 'fUmBx9OHQsKnPv5blSQdxr:APA91bHn3QFqpHtKhRzw3rDoKXomLDqM5R5YgX5N7I8wCYAOVLusXPOT_QQRax8bJESQvQ8XjstKL_VlQPdbZXLipeVPRyldp2f8ewCi3-Axdl6DbB2m_jvYMMiOn8zYHIJHOe57bIdV', '', 46, 46, 46, '2020-07-14 09:30:57', '2020-08-14 17:33:01'),
(20, 'ed1ed971a87b805', '7016811699', 'android', '6.0.1', 'cBHOeX_GSh-HDNsE54lLJQ:APA91bG-6UutDcGHJypBA8kPCm5vX5miM5xCnVKVh25da3l9Un2piHDbyg1ZrRG9WgrSsEeDArG48OXGueIZUsC_8Zo3Kl4or0teSFAjXxgWBvJnIJ4oNFlMeYPL-Mwwbkg6xtCF1VRk', '', 52, 1, 1, '2020-07-14 10:59:01', '2020-08-27 08:08:05'),
(21, 'd48ff62ffe39888e', '9033348602', 'android', '9', 'cCRzFLDFSpe5HHxQ-a2xpM:APA91bGQnxUz8qwL_DevTOJ4zPsS3Usyp-mj0gkaiSHl2mp7QxIGWdsugXN9AoNA9lolMaIPHFz_IMnsPaqnnyQCvz-hk3z70i4X25bWobXA-r3aIgaZmjetRjAYw0S4yNPIDaMzqOte', '', 53, 1, 1, '2020-07-16 05:56:45', '2020-08-21 09:04:42'),
(22, 'ed1ed971a87b805', '9033348602', 'android', '6.0.1', 'cpJvm70MRxa2C3G6iSf5p3:APA91bGsVjhH6nUeJukiq8rmV8o8swvrrgd0r7viCK92u4KCC5MdjcY5mDHz-K6szw1DwX6LgAF9Fs1RtvAs_l313YF3WgRz8azJq-bWFqpjTe4f7JNQD0vvpDLwli4gNa3rhSjS7Qca', '', 54, 54, 54, '2020-07-16 08:23:04', '2020-08-25 08:18:19'),
(23, 'ed1ed971a87b805', '9033348602', 'android', '6.0.1', 'cpJvm70MRxa2C3G6iSf5p3:APA91bGsVjhH6nUeJukiq8rmV8o8swvrrgd0r7viCK92u4KCC5MdjcY5mDHz-K6szw1DwX6LgAF9Fs1RtvAs_l313YF3WgRz8azJq-bWFqpjTe4f7JNQD0vvpDLwli4gNa3rhSjS7Qca', '', 56, 1, 1, '2020-07-21 03:54:55', '2020-08-25 10:41:37'),
(24, 'ed1ed971a87b805', '9033348602', 'android', '6.0.1', 'cpJvm70MRxa2C3G6iSf5p3:APA91bGsVjhH6nUeJukiq8rmV8o8swvrrgd0r7viCK92u4KCC5MdjcY5mDHz-K6szw1DwX6LgAF9Fs1RtvAs_l313YF3WgRz8azJq-bWFqpjTe4f7JNQD0vvpDLwli4gNa3rhSjS7Qca', '', 57, 1, 1, '2020-07-21 04:39:22', '2020-08-25 10:47:16'),
(25, 'ed1ed971a87b805', '9033348602', 'android', '6.0.1', 'cpJvm70MRxa2C3G6iSf5p3:APA91bGsVjhH6nUeJukiq8rmV8o8swvrrgd0r7viCK92u4KCC5MdjcY5mDHz-K6szw1DwX6LgAF9Fs1RtvAs_l313YF3WgRz8azJq-bWFqpjTe4f7JNQD0vvpDLwli4gNa3rhSjS7Qca', '', 58, 1, 1, '2020-07-24 16:07:06', '2020-08-25 10:54:30'),
(26, 'f46241375216a7a9', '', 'android', '10', 'fautMjvvSIKAHOhQKtAGEs:APA91bGgF9E9VqnmqK3IxXCEI9kZAJo_3gnLGQPJXr35R4hNGs96j2SDJf0aHUbbE7XhibZ83m4i5g5_e7988-BuWaksEIYTpxmcwFHhb1e9bkbtCgsdujkD52Ad6DACMPbDl6RDMYvD', '', 2, 2, 2, '2020-07-25 13:57:06', '2020-07-25 13:57:06'),
(27, 'f46241375216a7a9', '', 'android', '10', 'evmgeAUZTt-gWNQVHwIxnC:APA91bFN-mGPj_mzs9gngLS8YbvFxuniP2IXT6EluFp9Hmw4UBUbhOFYgS_YdL5GJigIy8O1Vg3yUtzKYD9rIrIvGapebjCOTBoEGR14Awo191UBfce2tKNGFCPV8gl95xzI9_OeXiNh', '', 3, 3, 3, '2020-07-25 14:08:09', '2020-07-25 14:08:09'),
(28, 'f46241375216a7a9', '', 'android', '10', 'evmgeAUZTt-gWNQVHwIxnC:APA91bFN-mGPj_mzs9gngLS8YbvFxuniP2IXT6EluFp9Hmw4UBUbhOFYgS_YdL5GJigIy8O1Vg3yUtzKYD9rIrIvGapebjCOTBoEGR14Awo191UBfce2tKNGFCPV8gl95xzI9_OeXiNh', '', 4, 4, 4, '2020-07-25 14:08:51', '2020-07-25 14:08:51'),
(29, '6', '', 'android', '6', '5', '', 5, 5, 5, '2020-07-25 14:09:26', '2020-07-25 14:09:26'),
(30, '6', '', 'android', '6', '5', '', 6, 6, 6, '2020-07-25 14:12:11', '2020-07-25 14:12:11'),
(31, '6', '', 'android', '6', '5', '', 7, 7, 7, '2020-07-25 14:13:43', '2020-07-25 14:13:43'),
(32, '6', '', 'android', '6', '5', '', 8, 8, 8, '2020-07-25 14:14:22', '2020-07-25 14:14:22'),
(33, '6', '', 'android', '6', '5', '', 9, 9, 9, '2020-07-25 14:16:53', '2020-07-25 14:16:53'),
(34, '6', '', 'android', '6', '5', '', 10, 10, 10, '2020-07-25 14:18:10', '2020-07-25 14:18:10'),
(35, 'f46241375216a7a9', '', 'android', '10', 'cj89C9f7Rkqx2O07-0AXrf:APA91bELchYPKTUIOK4O_mIFE5LZHQq6kFSxUKFxzKB_8FE-6ZK-oejIl2KNkIOv0G_08KNAFEMlai0nTXZ173XjGmdzgdza6Tfa4kwU5LMmYPRL1jyNNYHvhzKsEEaJ1DOnE4RYr5dg', '', 11, 11, 11, '2020-07-25 14:20:51', '2020-07-25 14:20:51'),
(36, 'b40da31a09304909', '', 'android', '8.1.0', 'ceeiZ2fdQU2m4cNXehgRnh:APA91bH-Uv7hTqdaa43_rFrF3aFXkwtbmhCtNdRkv5OeQ1GVeA6QEpUNnMjZQlZPK6o_EDhLNf4_0WEHmKZJA3NqrgDKmy7XmM71SpdkkEtDAlpkDpTJetJCz0AE-zO1--wn7lM_Pdlp', '', 14, 14, 14, '2020-07-25 23:39:52', '2020-07-25 23:39:52'),
(37, 'b40da31a09304909', '', 'android', '8.1.0', 'ceeiZ2fdQU2m4cNXehgRnh:APA91bH-Uv7hTqdaa43_rFrF3aFXkwtbmhCtNdRkv5OeQ1GVeA6QEpUNnMjZQlZPK6o_EDhLNf4_0WEHmKZJA3NqrgDKmy7XmM71SpdkkEtDAlpkDpTJetJCz0AE-zO1--wn7lM_Pdlp', '', 16, 16, 16, '2020-07-25 23:46:56', '2020-07-25 23:46:56'),
(38, 'ed1ed971a87b805', '9327647270', 'android', '6.0.1', 'fs58zFhHRsaGxB8gvVP_O0:APA91bFWD8CcpqrhNyKJF23HKDNADuWIFKpItbz_WyNZaQZidef9CxQrmJF9cT2snKmWWlhmSKcfg_07f4hrFm_E4JjWNtRcQVZdsHCt5_bWNRwdsvlkc1_yNZyx_nyIKKFftDOa4gbc', '', 17, 1, 1, '2020-07-26 00:04:20', '2020-08-29 09:13:59'),
(39, 'fa0aa09e2c6c20b5', '', 'android', '10', 'cnVjgwuNTT-jNqq8GZQ9ES:APA91bEY6RfJhfALF2vcy4pR2imtmarqZiL3BZzlGwhmsfVIBiQ5HmFbubtkO1_wQHZhCnkIDXecKl9cik0o3FWNRN9YuM_kRIS4_5HYtsVC7-VASUR757GgZB8ZQQxjPXk7myMid7FT', '', 18, 18, 18, '2020-07-26 08:23:55', '2020-07-26 08:23:55'),
(40, '3318101cc6480055', '', 'android', '8.0.0', 'du6KzZOCSWOY6CgU68JyNJ:APA91bH41oolOg4ot0Imuhl8Or2WgM8Z_1Rk6RcSrdFj-Mzn9UL1M9PgvFAwWDCLXnhszbh5ddClbKGp72SZPiW_jZl2Evnxrt19jcLZ9DHgHBNPeKfQWMVo0RcAP57GRKsvqob7jOvr', '', 23, 23, 23, '2020-07-28 12:28:52', '2020-07-28 12:28:52'),
(41, '11414c704904c019', '9033348602', 'android', '9', 'eNAIZxFITdmfoNhEhZAKuM:APA91bGrCJZlW5wnhIKIh5XE972ASZ51mQrKblnhODK3x8VAn5mxoPlxdWjG3A50G9eaeUtyPUCrfXzg-mttsU_yTOrlBtf6Q2USeCdH6k4wLirZI6Mlxn8Vbqqzj-o7iN5cunyDQCAz', '', 40, 1, 1, '2020-07-31 09:17:20', '2020-08-17 10:00:15'),
(42, '11414c704904c019', '9033348602', 'android', '9', 'eNAIZxFITdmfoNhEhZAKuM:APA91bGrCJZlW5wnhIKIh5XE972ASZ51mQrKblnhODK3x8VAn5mxoPlxdWjG3A50G9eaeUtyPUCrfXzg-mttsU_yTOrlBtf6Q2USeCdH6k4wLirZI6Mlxn8Vbqqzj-o7iN5cunyDQCAz', '', 47, 47, 47, '2020-08-17 11:56:27', '2020-08-17 11:56:27'),
(43, '11414c704904c019', '9033348602', 'android', '9', 'eNAIZxFITdmfoNhEhZAKuM:APA91bGrCJZlW5wnhIKIh5XE972ASZ51mQrKblnhODK3x8VAn5mxoPlxdWjG3A50G9eaeUtyPUCrfXzg-mttsU_yTOrlBtf6Q2USeCdH6k4wLirZI6Mlxn8Vbqqzj-o7iN5cunyDQCAz', '', 48, 48, 48, '2020-08-17 15:36:20', '2020-08-17 16:07:06'),
(44, '11414c704904c019', '9033348602', 'android', '9', 'eNAIZxFITdmfoNhEhZAKuM:APA91bGrCJZlW5wnhIKIh5XE972ASZ51mQrKblnhODK3x8VAn5mxoPlxdWjG3A50G9eaeUtyPUCrfXzg-mttsU_yTOrlBtf6Q2USeCdH6k4wLirZI6Mlxn8Vbqqzj-o7iN5cunyDQCAz', '', 49, 49, 49, '2020-08-17 16:08:56', '2020-08-17 16:11:57'),
(45, '11414c704904c019', '9033348602', 'android', '9', 'eNAIZxFITdmfoNhEhZAKuM:APA91bGrCJZlW5wnhIKIh5XE972ASZ51mQrKblnhODK3x8VAn5mxoPlxdWjG3A50G9eaeUtyPUCrfXzg-mttsU_yTOrlBtf6Q2USeCdH6k4wLirZI6Mlxn8Vbqqzj-o7iN5cunyDQCAz', '', 50, 50, 50, '2020-08-17 16:19:03', '2020-08-17 16:19:03'),
(46, 'ed1ed971a87b805', '9033348602', 'android', '6.0.1', 'dKiUZy9lSh6CHH3le4LnSi:APA91bGUZMP19lsWUyuKY_JKHKsIGfQS7QSoR7wz5OeSskLq8MSsPu4TofHxc9END29oy1c12envttWX9DApINdtG-FSLG2hvxxp3Weal4lTQupihVzw9drL6Vo_ubKhjKUZkryajYy5', '', 51, 1, 1, '2020-08-17 16:25:44', '2020-08-19 09:44:32'),
(47, '79b029c142177017', '7016811691', 'android', '10', 'fsIKPxt4Sm2ViSUS5xlmOU:APA91bG7MGClFZydGO6iG8AL9vMjGSgONf1xdaNdfdrfxTZV0QGozbBgN1fZvdysFj7FYA8HDVRF9lnUiSzHUTcL8hCCqM4nNFWhRR0M2xSJB2eTAOFS7ViD-q4dVIRGtMHVG_LpBbK8', '', 39, 1, 1, '2020-08-20 17:32:12', '2020-08-20 17:32:12'),
(48, '12cb9d18872d2fe3', '2208202000', 'android', '8.1.0', 'cEXscOdJRMuQoEf8c_2aYh:APA91bH7a7Op1eNbiScN_QfdN_ZR5XeDNibJphk8O3oqRvrFQsxA_g4H4qj65VhELy7DPZ_qYelvGOa7cczT9LnFl8ayh2X2sxiKJ593-0x2xJl0ytaxSSeH2mH29gR0FTV6m3HO81Vg', '', 55, 55, 55, '2020-08-22 08:18:23', '2020-08-22 08:18:23'),
(49, '8c62e97a412cdd5f', '9825790687', 'android', '10', 'eSVoj10PSriYvRJrqTHdah:APA91bHx-FgVsSs0iVftU9_GQc8j2U38eHbyx1vjiOGOyRtZ5FKeu14Tk_Ep47V-uHkvwtTGM422UwjE5aSp1kvhTXIaTjM9eo8OwFFo5KQJNJT8xXbUyAW2pPUct0aAw0u3q-4OYwNd', '', 20, 1, 1, '2020-08-25 07:17:38', '2020-08-25 07:17:38'),
(50, 'ed1ed971a87b805', '9033348602', 'android', '6.0.1', 'cpJvm70MRxa2C3G6iSf5p3:APA91bGsVjhH6nUeJukiq8rmV8o8swvrrgd0r7viCK92u4KCC5MdjcY5mDHz-K6szw1DwX6LgAF9Fs1RtvAs_l313YF3WgRz8azJq-bWFqpjTe4f7JNQD0vvpDLwli4gNa3rhSjS7Qca', '', 59, 59, 59, '2020-08-25 10:56:11', '2020-08-25 10:56:11'),
(51, 'ed1ed971a87b805', '9033348602', 'android', '6.0.1', 'cndNAsv1SD2leT1gRV6u5r:APA91bHwQ_Wbf77Yv2F3h0Ps-A9smK05rpQpm78AkAqI9ac8lbaaxqPhwBfDFKGdUYA17TZ3bu_-Q1JXgWGJdqfFdgQn8n82RvIw1TGhRqc-ET15V_INWdhIAKoyOsHkRr5K7G19x892', '', 60, 1, 1, '2020-08-25 11:09:56', '2020-08-26 08:16:14'),
(52, 'ed1ed971a87b805', '9033348602', 'android', '6.0.1', 'cBHOeX_GSh-HDNsE54lLJQ:APA91bG-6UutDcGHJypBA8kPCm5vX5miM5xCnVKVh25da3l9Un2piHDbyg1ZrRG9WgrSsEeDArG48OXGueIZUsC_8Zo3Kl4or0teSFAjXxgWBvJnIJ4oNFlMeYPL-Mwwbkg6xtCF1VRk', '', 61, 1, 1, '2020-08-27 14:05:51', '2020-08-27 14:05:51'),
(53, 'ed1ed971a87b805', '9033348602', 'android', '6.0.1', 'cBHOeX_GSh-HDNsE54lLJQ:APA91bG-6UutDcGHJypBA8kPCm5vX5miM5xCnVKVh25da3l9Un2piHDbyg1ZrRG9WgrSsEeDArG48OXGueIZUsC_8Zo3Kl4or0teSFAjXxgWBvJnIJ4oNFlMeYPL-Mwwbkg6xtCF1VRk', '', 62, 62, 62, '2020-08-27 16:15:16', '2020-08-27 16:20:25'),
(54, 'ed1ed971a87b805', '9033348602', 'android', '6.0.1', 'cBHOeX_GSh-HDNsE54lLJQ:APA91bG-6UutDcGHJypBA8kPCm5vX5miM5xCnVKVh25da3l9Un2piHDbyg1ZrRG9WgrSsEeDArG48OXGueIZUsC_8Zo3Kl4or0teSFAjXxgWBvJnIJ4oNFlMeYPL-Mwwbkg6xtCF1VRk', '', 63, 1, 1, '2020-08-28 14:54:37', '2020-08-28 14:54:37'),
(55, 'ed1ed971a87b805', '9033348602', 'android', '6.0.1', 'cBHOeX_GSh-HDNsE54lLJQ:APA91bG-6UutDcGHJypBA8kPCm5vX5miM5xCnVKVh25da3l9Un2piHDbyg1ZrRG9WgrSsEeDArG48OXGueIZUsC_8Zo3Kl4or0teSFAjXxgWBvJnIJ4oNFlMeYPL-Mwwbkg6xtCF1VRk', '', 64, 64, 64, '2020-08-28 15:16:04', '2020-08-28 15:16:04'),
(56, 'ed1ed971a87b805', '9033348602', 'android', '6.0.1', 'cBHOeX_GSh-HDNsE54lLJQ:APA91bG-6UutDcGHJypBA8kPCm5vX5miM5xCnVKVh25da3l9Un2piHDbyg1ZrRG9WgrSsEeDArG48OXGueIZUsC_8Zo3Kl4or0teSFAjXxgWBvJnIJ4oNFlMeYPL-Mwwbkg6xtCF1VRk', '', 65, 1, 1, '2020-08-28 15:18:44', '2020-08-28 15:18:44'),
(57, 'ed1ed971a87b805', '9033348602', 'android', '6.0.1', 'fs58zFhHRsaGxB8gvVP_O0:APA91bFWD8CcpqrhNyKJF23HKDNADuWIFKpItbz_WyNZaQZidef9CxQrmJF9cT2snKmWWlhmSKcfg_07f4hrFm_E4JjWNtRcQVZdsHCt5_bWNRwdsvlkc1_yNZyx_nyIKKFftDOa4gbc', '', 66, 1, 1, '2020-08-28 16:08:46', '2020-08-28 16:08:46'),
(58, 'ed1ed971a87b805', '9033348602', 'android', '6.0.1', 'epwdpYsuT-ui08UidgkHJk:APA91bECldB7yRKIBqKD30yZTP7_hbGIajO1mWH58ol6vq8zIf_BQnPW0hJQj7psRNxzNeTmpTRxmDn35wNFpmtm4M3ARZ5ZSodk1XBrD0l62UUlEDYDqYeHvbPWrl_v1FaeJdhDaR3Y', '', 67, 1, 1, '2020-08-31 14:26:36', '2020-09-01 14:09:20'),
(59, 'ed1ed971a87b805', '9033348602', 'android', '6.0.1', 'epwdpYsuT-ui08UidgkHJk:APA91bECldB7yRKIBqKD30yZTP7_hbGIajO1mWH58ol6vq8zIf_BQnPW0hJQj7psRNxzNeTmpTRxmDn35wNFpmtm4M3ARZ5ZSodk1XBrD0l62UUlEDYDqYeHvbPWrl_v1FaeJdhDaR3Y', '', 68, 1, 1, '2020-09-02 16:22:21', '2020-09-02 16:22:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_list`
--
ALTER TABLE `address_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_item`
--
ALTER TABLE `category_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_feedback`
--
ALTER TABLE `customer_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_remarks`
--
ALTER TABLE `customer_remarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `double_google_order`
--
ALTER TABLE `double_google_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `double_google_order_items`
--
ALTER TABLE `double_google_order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `double_google_order_photos`
--
ALTER TABLE `double_google_order_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_location`
--
ALTER TABLE `driver_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `global_setting`
--
ALTER TABLE `global_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_customer`
--
ALTER TABLE `guest_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_customer_remark`
--
ALTER TABLE `guest_customer_remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_order_status_foreign` (`order_status`),
  ADD KEY `order_driver_id_foreign` (`driver_id`),
  ADD KEY `receiver_city` (`receiver_city`),
  ADD KEY `sender_city` (`sender_city`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_address`
--
ALTER TABLE `order_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_type`
--
ALTER TABLE `order_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_update_log`
--
ALTER TABLE `order_update_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_status`
--
ALTER TABLE `payment_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo_code`
--
ALTER TABLE `promo_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remarks`
--
ALTER TABLE `remarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sending_item`
--
ALTER TABLE `sending_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_or_restaurant`
--
ALTER TABLE `store_or_restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_device_detail`
--
ALTER TABLE `user_device_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_list`
--
ALTER TABLE `address_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `category_item`
--
ALTER TABLE `category_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `customer_feedback`
--
ALTER TABLE `customer_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer_remarks`
--
ALTER TABLE `customer_remarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `double_google_order`
--
ALTER TABLE `double_google_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=415;

--
-- AUTO_INCREMENT for table `double_google_order_items`
--
ALTER TABLE `double_google_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT for table `double_google_order_photos`
--
ALTER TABLE `double_google_order_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `driver_location`
--
ALTER TABLE `driver_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `global_setting`
--
ALTER TABLE `global_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guest_customer`
--
ALTER TABLE `guest_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guest_customer_remark`
--
ALTER TABLE `guest_customer_remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `order_address`
--
ALTER TABLE `order_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=465;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_type`
--
ALTER TABLE `order_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_update_log`
--
ALTER TABLE `order_update_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payment_status`
--
ALTER TABLE `payment_status`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `promo_code`
--
ALTER TABLE `promo_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `remarks`
--
ALTER TABLE `remarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sending_item`
--
ALTER TABLE `sending_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `store_or_restaurant`
--
ALTER TABLE `store_or_restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_device_detail`
--
ALTER TABLE `user_device_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`id`),
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`receiver_city`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`sender_city`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `order_order_status_foreign` FOREIGN KEY (`order_status`) REFERENCES `order_status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
