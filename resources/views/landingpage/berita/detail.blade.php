@extends('frontend.layouts.main')
@include('frontend.layouts.header')
@include('frontend.layouts.footer')



@section('contents')
    <div class="main-wrapper overflow-hidden">
        <!-- ------------------------------------- -->
        <!-- banner Start -->
        <!-- ------------------------------------- -->
        <section class="bg-primary-subtle pt-lg-14 py-lg-0 py-5">
            <div class="container-fluid">
                <div class="text-center">
                    <div class="d-flex justify-content-center">
                        <p class="fs-2 px-2 rounded-pill bg-muted bg-opacity-25 text-dark mb-0">
                            Web Development
                        </p>
                    </div>
                    <h2 class="text-dark fs-12 fw-bolder px-xl-12 my-9">
                        Building responsive websites: tips and tricks for modern developers
                    </h2>
                    <div class="d-flex justify-content-center align-items-center gap-10">
                        <div class="d-flex gap-2">
                            <i class="ti ti-eye fs-5 text-dark"></i>
                            <p class="mb-0 fs-2 fw-semibold text-dark">6941</p>
                        </div>
                        <div class="d-flex gap-2">
                            <i class="ti ti-message fs-5 text-dark"></i>
                            <p class="mb-0 fs-2 fw-semibold text-dark">3</p>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <i class="ti ti-circle fs-2"></i>
                            <p class="mb-0 fs-2 fw-semibold text-dark">Tue, May 2</p>
                        </div>
                    </div>
                </div>
                <div class="mt-7 mt-md-5">
                    <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/frontend-pages/blog-detail-banner.jpg"
                        alt="blog detail banner" class="img-fluid rounded-3 mb-n11">
                </div>
            </div>
        </section>
        <!-- ------------------------------------- -->
        <!-- banner End -->
        <!-- ------------------------------------- -->

        <!-- ------------------------------------- -->
        <!-- Details Start -->
        <!-- ------------------------------------- -->
        <section class="mt-11 pb-md-5 pb-lg-12 pt-lg-14">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="d-flex flex-column gap-3">
                            <div class="d-flex gap-3 pb-3 border-bottom ">
                                <div>
                                    <img src="../assets/images/profile/user-3.jpg" alt="user" class="rounded-circle"
                                        width="44px" height="44px">
                                </div>
                                <div class="">
                                    <p class="mb-0 text-dark fs-4 fw-semibold">Zachary Smith</p>
                                    <p class="mb-0 fs-3 fw-bold">Product Manager</p>
                                </div>
                            </div>
                            <div class="py-9 d-flex flex-column gap-3 border-bottom">
                                <h4 class="fs-3 fw-bold text-uppercase text-muted mb-0 ">Contents</h4>
                                <a href="#mobile-first-approach" class="text-dark fs-4 fw-semibold link-primary">Adopt a
                                    Mobile-First Approach</a>
                                <a href="#fluid-grid-layouts" class="text-dark fs-4 fw-semibold link-primary">Use Fluid
                                    Grid Layouts</a>
                                <a href="#leverage-media" class="text-dark fs-4 fw-semibold link-primary">Leverage Media
                                    Queries</a>
                                <a href="#optimize-images" class="text-dark fs-4 fw-semibold link-primary">Optimize
                                    Images for Different Devices</a>
                                <a href="#conclusion" class="text-dark fs-4 fw-semibold link-primary">Conclusion</a>
                            </div>
                            <div class="py-9">
                                <h4 class="text-uppercase fs-3 fw-bold">Share</h4>
                                <div class="d-flex gap-6">
                                    <a href="#" class="border round-40 hstack justify-content-center rounded-circle"
                                        data-bs-toggle="tooltip" data-bs-title="Facebook">
                                        <img src="../assets/images/frontend-pages/icon-facebook-fill.svg" alt="facebook">
                                    </a>
                                    <a href="#" class="border round-40 hstack justify-content-center rounded-circle"
                                        data-bs-toggle="tooltip" data-bs-title="Instagram">
                                        <img src="../assets/images/frontend-pages/icon-instagram.svg" alt="instagram">
                                    </a>
                                    <a href="#" class="border round-40 hstack justify-content-center rounded-circle"
                                        data-bs-toggle="tooltip" data-bs-title="YouTube">
                                        <img src="../assets/images/frontend-pages/icon-youtube.svg" alt="youtube">
                                    </a>
                                    <a href="#" class="border round-40 hstack justify-content-center rounded-circle"
                                        data-bs-toggle="tooltip" data-bs-title="Linckedin">
                                        <img src="../assets/images/frontend-pages/icon-linckedin.svg" alt="linckedin">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 mb-lg-0 mb-7">
                        <div class="d-flex flex-column gap-sm-4 gap-3">
                            <div class="">
                                <p class="fs-4 mb-sm-4 mb-3">
                                    In today’s digital age, having a responsive website is no longer optional—it’s a
                                    necessity. With the increasing variety of devices used to access the web, from
                                    smartphones and tablets to laptops and large desktop monitors, developers face the
                                    challenge of ensuring a seamless experience across all screen sizes.
                                </p>
                                <p class="fs-4 mb-0">
                                    This article offers essential tips and tricks for modern developers to create
                                    responsive
                                    websites that not only look great but also perform efficiently.
                                </p>
                            </div>
                            <div class="" id="mobile-first-approach">
                                <h3 class="fs-7 fw-bolder mb-sm-4 mb-3">
                                    Adopt a Mobile-First Approach
                                </h3>
                                <p class="fs-4 mb-0">
                                    Starting with mobile design and then scaling up is a widely recommended approach. By
                                    prioritizing the mobile experience, developers can ensure that the most critical
                                    content is accessible on smaller screens. Once the mobile version is optimized,
                                    expanding to larger screens becomes much easier.
                                </p>
                            </div>
                            <div class="" id="fluid-grid-layouts">
                                <h3 class="fs-7 fw-bolder mb-sm-4 mb-3">
                                    Use Fluid Grid Layouts
                                </h3>
                                <p class="fs-4 mb-0">
                                    A fluid grid layout is the backbone of a responsive design. Unlike fixed layouts,
                                    fluid grids use relative units like percentages instead of pixels, allowing the
                                    layout to adjust smoothly across different screen sizes. Popular frameworks like
                                    <a href="https://getbootstrap.com/" class="text-underline text-primary link-primary"
                                        target="_blank">Bootstrap</a> and Foundation
                                    offer pre-built grid systems that simplify the
                                    implementation of fluid grids.
                                </p>
                            </div>
                            <div class="" id="leverage-media">
                                <h3 class="fs-7 fw-bolder mb-sm-4 mb-3">
                                    Leverage Media Queries
                                </h3>
                                <p class="fs-4 mb-sm-4 mb-3">
                                    Media queries are CSS techniques that apply styles based on the screen size or
                                    device characteristics. By using media queries, developers can create breakpoints in
                                    their design, ensuring that the layout adapts to different screen widths. For
                                    instance, you might want to change the font size or adjust the padding on a smaller
                                    screen. A simple example of a media query is:
                                </p>
                                <ul class="list mb-0">
                                    <li>
                                        <p class="fs-4 mb-1">
                                            <span class="fw-bolder">Set Breakpoints</span>: Define breakpoints for
                                            different screen sizes (e.g., 600px,
                                            768px, 1024px) to adjust the layout and design elements.
                                        </p>
                                    </li>
                                    <li>
                                        <p class="fs-4 mb-1">
                                            <span class="fw-bolder">Adjust Font Sizes</span>: Use media
                                            queries to change font sizes for readability on smaller screens.
                                        </p>
                                    </li>
                                    <li>
                                        <p class="fs-4 mb-1">
                                            <span class="fw-bolder">Modify Layout</span>: Rearrange or
                                            hide certain elements based on the screen size to maintain a clean design.
                                        </p>
                                    </li>
                                    <li>
                                        <p class="fs-4 mb-1">
                                            <span class="fw-bolder">Responsive Images</span>: Serve
                                            different image sizes using media queries to improve loading times.
                                        </p>
                                    </li>
                                    <li>
                                        <p class="fs-4 mb-1">
                                            <span class="fw-bolder">Test Across Devices</span>: Ensure
                                            media queries work as intended on various devices and orientations.
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="" id="optimize-images">
                                <h3 class="fs-7 fw-bolder mb-sm-4 mb-3">
                                    Optimize Images for Different Devices
                                </h3>
                                <p class="fs-4 mb-sm-4 mb-3">
                                    Images can make or break the performance of a website. To ensure that your website
                                    loads quickly on all devices, consider using responsive images. The &lt;picture&gt;
                                    element in HTML5 allows you to serve different images based on the screen size
                                    or resolution. Additionally, tools like
                                    <a href="https://imageoptim.com/" class="text-underline text-primary link-primary"
                                        target="_blank">ImageOptim</a>
                                    and
                                    <a href="https://imageoptim.com/" class="text-underline text-primary link-primary"
                                        target="_blank">TinyPNG</a>
                                    can help you compress images without sacrificing quality.
                                </p>
                                <p class="fs-4 mb-0">
                                    Responsive design isn’t just about screen sizes—it’s also about accessibility. Make
                                    sure your website is usable for people with disabilities by following accessibility
                                    best practices. Use semantic HTML, ensure keyboard navigation works seamlessly, and
                                    provide alternative text for images. The
                                    <a href="https://www.w3.org/WAI/WCAG21/quickref/"
                                        class="text-underline text-primary link-primary" target="_blank">Web Content
                                        Accessibility
                                        Guidelines (WCAG)</a>
                                    provide a comprehensive overview of accessibility standards.
                                </p>
                            </div>
                            <div class="" id="conclusion">
                                <h3 class="fs-7 fw-bolder mb-sm-4 mb-3">
                                    Conclusion
                                </h3>
                                <p class="fs-4 mb-sm-4 mb-3">
                                    Building responsive websites requires careful planning, testing, and a deep
                                    understanding of both design and development principles. By adopting a mobile-first
                                    approach, leveraging fluid grids and media queries, and optimizing both performance
                                    and accessibility, modern developers can create websites that deliver a seamless
                                    experience across all devices. As the famous saying goes, "A responsive design is
                                    not a luxury; it's a necessity for every website today."
                                </p>
                                <p class="fs-4 mb-0">
                                    Incorporating these tips and tricks into your workflow will not only improve the
                                    user experience but also ensure your website stands out in today’s competitive
                                    digital landscape.
                                </p>
                                <div class="my-4 px-9 py-6 bg-info-subtle border-3 border-start border-primary">
                                    <p class="fs-4 mb-0">
                                        "A responsive design is not a luxury; it's a necessity for
                                        every website today."
                                    </p>
                                </div>
                                <p class="fs-4 mb-0">
                                    For more resources on responsive web design, check out the
                                    <a href="https://www.w3.org/WAI/WCAG21/quickref/"
                                        class="text-underline text-primary link-primary" target="_blank">
                                        MDN Web Docs and Smashing
                                    </a>
                                    Magazine’s Guide.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ------------------------------------- -->
        <!-- Details End -->
        <!-- ------------------------------------- -->
    @endsection
