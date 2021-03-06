import { Component }          from '@angular/core';

@Component({
  selector: 'my-app',
  template: `
  <header id="main-header">
        <div id="header-top">
            <div class="header-top-content container">
                <!-- Language Switcher -->
                <ul id="language-switcher" class="list-inline">
                    <li><a href="../index.html">Pl</a></li>
                </ul>
                <!-- End of Language Switcher -->

                <!-- Login Links -->
				<ul id="login-boxes" class="list-inline">
					<li><a id="login-form-butt" href="forms/login.html">Login</a></li>
					<li><a id="register-form-butt" href="forms/register.html">Register</a></li>
				</ul>
                <!-- End of Login Links -->
            </div>
        </div>
        <div class="main-header-cont container">
            <!-- Top Logo -->
            <div class="logo-main-box col-xs-6 col-sm-4 col-md-3">
                <span class="bold">Home</span>
                <span> S</span>
                <div class="logo"></div>
                <span>uare</span>
            </div>
            <!-- End of Top Logo -->
            <!-- Main Menu -->
            <div class="menu-container col-xs-6 col-sm-8 col-md-9">
                <!-- Main Menu -->
                <nav id="main-menu" class="hidden-xs hidden-sm">
                    <ul class="main-menu list-inline">
                        <li><span class="current"><a routerLink="/home" routerLinkActive="active">Home</a></span><!--
                            <ul>
                                <li><a href="index.html" class="current">Home - Map</a></li>
                                <li><a href="index-slider.html">Home - Slider</a></li>
								<li><a href="index-slider-1.html">Home - Slider V2</a></li>
                                <li><a href="index-map.html">Home - Map Only</a></li>
                                <li><a href="index-slider-fullscreen.html">Home - Full Screen Slider</a></li> 
                            </ul>-->
                        </li><!-- Menu items ( You can change the link and its text ) -->
                        <li><span><a routerLink="/property-details" routerLinkActive="active">Property Details</a></span><!-- Menu items with submenu ("has-sub-menu" class is the helper for your future uses) -->
                           <!-- <ul>
                                <li><a href="pages/property-listing-grid.html">Property Listings - Grid</a></li>
								<li><a href="pages/property-listing-sidebar.html">Property Listings - Grid &amp; Sidebar</a></li>
								<li><a href="pages/property-listing-rows.html">Property Listings - Rows</a></li>
								<li><a href="pages/property-listing-map.html">Property Listings - Map</a></li> 
								<li><a href="pages/property-details.html">Property Details</a></li>
                            </ul>-->
                        </li>
                        <li><a routerLink="/property-compare" routerLinkActive="active">Property Compare</a></li>
                        <li><span>Agents</span>
                            <ul>
                                <li><a href="pages/agents.html">Agents Listing</a></li>
                                <li><a href="pages/agent-details.html">Agent Details</a></li>
                            </ul>
                        </li><!--
                        <li><span>Gallery</span>
							<ul>
								<li><a href="pages/gallery-two-cols.html">Gallery - 2 Columns</a></li>
								<li><a href="pages/gallery-three-cols.html">Gallery - 3 Columns</a></li>
								<li><a href="pages/gallery-four-cols.html">Gallery - 4 Columns</a></li>
							</ul>
						</li>
                        <li><span>Blog</span>
                            <ul>
                                <li><a href="pages/blog.html">Blog - Right Sidebar</a></li>
                                <li><a href="pages/blog-left-sidebar.html">Blog - Left Sidebar</a></li>
                                <li><a href="pages/blog-details.html">Single Post</a></li>
                            </ul>
                        </li> -->
						<li><span>Pages</span>
							<ul><!--
								<li><a href="pages/testimonials.html">Testimonials</a></li>
								<li><a href="pages/video-tour.html">Video Tour</a></li>
								<li><a href="pages/404.html">404</a></li> -->
								<li><a href="pages/services.html">Services</a></li>
								<li><a href="pages/faq.html">FAQ</a></li>
							</ul>
						</li>
                        <li><a href="pages/contact.html">Contact</a></li>
                    </ul>
                </nav>
                <!-- END of Main Menu -->

				<div id="main-menu-handle" class="hidden-md hidden-lg"><i class="fa fa-bars"></i></div><!-- Mobile Menu handle -->
        	<!--	<a id="submit-property-link" class="btn" href="pages/submit-property.html"><span>Submit Your Property</span></a>
			THIS TAKES YOU TO THE FORM WITH THE FORM ALREADY SET UP -->
            </div>
            <!-- End of Main Menu -->
 		</div>
		<div id="mobile-menu-container" class="hidden-md hidden-lg"></div>
	</header>
    <router-outlet></router-outlet>
  `
})
export class AppComponent {
}


/*
Copyright 2016 Google Inc. All Rights Reserved.
Use of this source code is governed by an MIT-style license that
can be found in the LICENSE file at http://angular.io/license
*/