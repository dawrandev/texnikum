<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.6.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.6.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-categories" class="tocify-header">
                <li class="tocify-item level-1" data-unique="categories">
                    <a href="#categories">Categories</a>
                </li>
                                    <ul id="tocify-subheader-categories" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="categories-GETapi-v1-categories">
                                <a href="#categories-GETapi-v1-categories">Get all categories</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="categories-GETapi-v1-categories--id-">
                                <a href="#categories-GETapi-v1-categories--id-">Get category by ID</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-user">
                                <a href="#endpoints-GETapi-user">GET api/user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-showLoginForm">
                                <a href="#endpoints-GETapi-v1-showLoginForm">GET api/v1/showLoginForm</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-interactive-services" class="tocify-header">
                <li class="tocify-item level-1" data-unique="interactive-services">
                    <a href="#interactive-services">Interactive Services</a>
                </li>
                                    <ul id="tocify-subheader-interactive-services" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="interactive-services-GETapi-v1-interactive-services">
                                <a href="#interactive-services-GETapi-v1-interactive-services">Get all interactive services</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-partners" class="tocify-header">
                <li class="tocify-item level-1" data-unique="partners">
                    <a href="#partners">Partners</a>
                </li>
                                    <ul id="tocify-subheader-partners" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="partners-GETapi-v1-partners">
                                <a href="#partners-GETapi-v1-partners">Get all partners</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-posts" class="tocify-header">
                <li class="tocify-item level-1" data-unique="posts">
                    <a href="#posts">Posts</a>
                </li>
                                    <ul id="tocify-subheader-posts" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="posts-GETapi-v1-posts-latest">
                                <a href="#posts-GETapi-v1-posts-latest">Get latest posts</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="posts-GETapi-v1-posts-all">
                                <a href="#posts-GETapi-v1-posts-all">Get all posts</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="posts-GETapi-v1-posts-category--id-">
                                <a href="#posts-GETapi-v1-posts-category--id-">Get posts by category</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="posts-GETapi-v1-posts-event-latest">
                                <a href="#posts-GETapi-v1-posts-event-latest">Get latest event posts</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="posts-GETapi-v1-posts-event-all">
                                <a href="#posts-GETapi-v1-posts-event-all">Get all event posts</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-statistics" class="tocify-header">
                <li class="tocify-item level-1" data-unique="statistics">
                    <a href="#statistics">Statistics</a>
                </li>
                                    <ul id="tocify-subheader-statistics" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="statistics-GETapi-v1-stats">
                                <a href="#statistics-GETapi-v1-stats">Get all statistics</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-videos" class="tocify-header">
                <li class="tocify-item level-1" data-unique="videos">
                    <a href="#videos">Videos</a>
                </li>
                                    <ul id="tocify-subheader-videos" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="videos-GETapi-v1-videos">
                                <a href="#videos-GETapi-v1-videos">Get all videos</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="videos-GETapi-v1-videos-latest">
                                <a href="#videos-GETapi-v1-videos-latest">Get latest videos</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: December 8, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="categories">Categories</h1>

    <p>Managing post categories</p>

                                <h2 id="categories-GETapi-v1-categories">Get all categories</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/categories" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/categories"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-categories">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Categories retrieved successfully&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;slug&quot;: &quot;news&quot;,
            &quot;name&quot;: &quot;News&quot;,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:32.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-08T16:59:32.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;slug&quot;: &quot;eco-active-students&quot;,
            &quot;name&quot;: &quot;Eco Active Students&quot;,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;slug&quot;: &quot;anti-corruption&quot;,
            &quot;name&quot;: &quot;Anti-Corruption&quot;,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;slug&quot;: &quot;events&quot;,
            &quot;name&quot;: &quot;Events&quot;,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-categories"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-categories">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-categories" data-method="GET"
      data-path="api/v1/categories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-categories"
                    onclick="tryItOut('GETapi-v1-categories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-categories"
                    onclick="cancelTryOut('GETapi-v1-categories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-categories"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/categories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

    <h3>Response</h3>
    <h4 class="fancy-heading-panel"><b>Response Fields</b></h4>
    <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>success</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Operation success status</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>message</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Response message</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>data</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>List of categories</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Category ID</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Category slug (unique identifier)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Category name (translated)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>created_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Category creation timestamp (ISO 8601 format)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>updated_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Category last update timestamp (ISO 8601 format)</p>
                    </div>
                                    </details>
        </div>
                        <h2 id="categories-GETapi-v1-categories--id-">Get category by ID</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-categories--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/categories/17" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/categories/17"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-categories--id-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Category not found&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-categories--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-categories--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-categories--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-categories--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-categories--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-categories--id-" data-method="GET"
      data-path="api/v1/categories/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-categories--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-categories--id-"
                    onclick="tryItOut('GETapi-v1-categories--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-categories--id-"
                    onclick="cancelTryOut('GETapi-v1-categories--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-categories--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/categories/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-categories--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-categories--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-v1-categories--id-"
               value="17"
               data-component="url">
    <br>
<p>Category ID Example: <code>17</code></p>
            </div>
                    </form>

    <h3>Response</h3>
    <h4 class="fancy-heading-panel"><b>Response Fields</b></h4>
    <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>success</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Operation success status</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>message</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Response message</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>data</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Category details</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Category ID</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Category slug (unique identifier)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Category name (translated)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>created_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Category creation timestamp (ISO 8601 format)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>updated_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Category last update timestamp (ISO 8601 format)</p>
                    </div>
                                    </details>
        </div>
                    <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-user">GET api/user</h2>

<p>
</p>



<span id="example-requests-GETapi-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/user" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/user"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-user">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-user" data-method="GET"
      data-path="api/user"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-user"
                    onclick="tryItOut('GETapi-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user"
                    onclick="cancelTryOut('GETapi-user');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-showLoginForm">GET api/v1/showLoginForm</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-showLoginForm">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/showLoginForm" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/showLoginForm"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-showLoginForm">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-showLoginForm" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-showLoginForm"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-showLoginForm"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-showLoginForm" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-showLoginForm">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-showLoginForm" data-method="GET"
      data-path="api/v1/showLoginForm"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-showLoginForm', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-showLoginForm"
                    onclick="tryItOut('GETapi-v1-showLoginForm');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-showLoginForm"
                    onclick="cancelTryOut('GETapi-v1-showLoginForm');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-showLoginForm"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/showLoginForm</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-showLoginForm"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-showLoginForm"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="interactive-services">Interactive Services</h1>

    <p>Managing online services and interactive tools</p>

                                <h2 id="interactive-services-GETapi-v1-interactive-services">Get all interactive services</h2>

<p>
</p>

<p>Retrieve a list of all available interactive services with their urls.</p>

<span id="example-requests-GETapi-v1-interactive-services">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/interactive-services" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/interactive-services"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-interactive-services">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Interactive services retrieved successfully&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;title&quot;: &quot;Подача заявлений на выход из академического отпуска&quot;,
            &quot;url&quot;: &quot;#&quot;,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;title&quot;: &quot;Вакансии рабочих мест в Университета&quot;,
            &quot;url&quot;: &quot;#&quot;,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;title&quot;: &quot;Получение данных об успеваемости студентов&quot;,
            &quot;url&quot;: &quot;#&quot;,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;title&quot;: &quot;Подача заявлений на проживание в студенческом общежитии&quot;,
            &quot;url&quot;: &quot;#&quot;,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;title&quot;: &quot;Получение справки об обучении&quot;,
            &quot;url&quot;: &quot;#&quot;,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;title&quot;: &quot;Система подачи заявлений по совместной образовательной программе&quot;,
            &quot;url&quot;: &quot;#&quot;,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-interactive-services" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-interactive-services"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-interactive-services"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-interactive-services" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-interactive-services">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-interactive-services" data-method="GET"
      data-path="api/v1/interactive-services"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-interactive-services', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-interactive-services"
                    onclick="tryItOut('GETapi-v1-interactive-services');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-interactive-services"
                    onclick="cancelTryOut('GETapi-v1-interactive-services');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-interactive-services"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/interactive-services</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-interactive-services"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-interactive-services"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

    <h3>Response</h3>
    <h4 class="fancy-heading-panel"><b>Response Fields</b></h4>
    <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>success</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Operation success status</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>message</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Response message</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>data</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>List of interactive services</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Service ID</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Service title</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Service URL (link)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>created_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Service creation timestamp (ISO 8601 format)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>updated_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Service last update timestamp (ISO 8601 format)</p>
                    </div>
                                    </details>
        </div>
                    <h1 id="partners">Partners</h1>

    <p>Managing partner institutions and organizations</p>

                                <h2 id="partners-GETapi-v1-partners">Get all partners</h2>

<p>
</p>

<p>Retrieve a list of all partner institutions with their logos and links.</p>

<span id="example-requests-GETapi-v1-partners">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/partners" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/partners"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-partners">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Partners retrieved successfully&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;KARSU&quot;,
            &quot;logo&quot;: &quot;partners/karsu.png&quot;,
            &quot;url&quot;: &quot;https://karsu.uz/uz/&quot;,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;TATU&quot;,
            &quot;logo&quot;: &quot;partners/tatu.png&quot;,
            &quot;url&quot;: &quot;https://tuit.uz/&quot;,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;NMTU&quot;,
            &quot;logo&quot;: &quot;partners/nmtu.png&quot;,
            &quot;url&quot;: &quot;https://nmtu.uz/&quot;,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-partners" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-partners"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-partners"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-partners" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-partners">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-partners" data-method="GET"
      data-path="api/v1/partners"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-partners', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-partners"
                    onclick="tryItOut('GETapi-v1-partners');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-partners"
                    onclick="cancelTryOut('GETapi-v1-partners');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-partners"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/partners</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-partners"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-partners"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

    <h3>Response</h3>
    <h4 class="fancy-heading-panel"><b>Response Fields</b></h4>
    <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>success</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Operation success status</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>message</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Response message</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>data</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>List of partners</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Partner ID</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Partner institution name</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>logo</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Partner logo image path</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>url</code></b>&nbsp;&nbsp;
<small>string|null</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Partner website URL</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>created_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Partner creation timestamp (ISO 8601 format)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>updated_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Partner last update timestamp (ISO 8601 format)</p>
                    </div>
                                    </details>
        </div>
                    <h1 id="posts">Posts</h1>

    <p>Managing blog posts and news articles</p>

                                <h2 id="posts-GETapi-v1-posts-latest">Get latest posts</h2>

<p>
</p>

<p>Retrieve the most recent blog posts (limited to latest 6).</p>

<span id="example-requests-GETapi-v1-posts-latest">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/posts/latest" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/posts/latest"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-posts-latest">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Latest posts retrieved successfully&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;category_id&quot;: 1,
            &quot;title&quot;: null,
            &quot;content&quot;: null,
            &quot;slug&quot;: &quot;qozon-federal-universiteti-vakillari-qoraqalpoq-davlat-universitetida&quot;,
            &quot;image&quot;: &quot;posts/post1.jpg&quot;,
            &quot;published_at&quot;: &quot;2025-12-08 21:59:33&quot;,
            &quot;views_count&quot;: 12,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;slug&quot;: &quot;news&quot;
            }
        },
        {
            &quot;id&quot;: 2,
            &quot;category_id&quot;: 1,
            &quot;title&quot;: null,
            &quot;content&quot;: null,
            &quot;slug&quot;: &quot;turkmanistonlik-olimlar-talabalar-bilan-uchrashdi&quot;,
            &quot;image&quot;: &quot;posts/post2.jpg&quot;,
            &quot;published_at&quot;: &quot;2025-12-08 21:59:33&quot;,
            &quot;views_count&quot;: 8,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;slug&quot;: &quot;news&quot;
            }
        },
        {
            &quot;id&quot;: 3,
            &quot;category_id&quot;: 1,
            &quot;title&quot;: null,
            &quot;content&quot;: null,
            &quot;slug&quot;: &quot;xalqaro-hamkorlik&quot;,
            &quot;image&quot;: &quot;posts/post3.jpg&quot;,
            &quot;published_at&quot;: &quot;2025-12-08 21:59:33&quot;,
            &quot;views_count&quot;: 15,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;slug&quot;: &quot;news&quot;
            }
        },
        {
            &quot;id&quot;: 4,
            &quot;category_id&quot;: 1,
            &quot;title&quot;: null,
            &quot;content&quot;: null,
            &quot;slug&quot;: &quot;qduda-soha-mutaxassislari-bilan-uchrashuv-otkazildi&quot;,
            &quot;image&quot;: &quot;posts/post4.jpg&quot;,
            &quot;published_at&quot;: &quot;2025-12-08 21:59:33&quot;,
            &quot;views_count&quot;: 20,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;slug&quot;: &quot;news&quot;
            }
        },
        {
            &quot;id&quot;: 5,
            &quot;category_id&quot;: 1,
            &quot;title&quot;: null,
            &quot;content&quot;: null,
            &quot;slug&quot;: &quot;fuqarolik-va-biznes-huquqi-kafedrasi-vakillarining-yuridik-klinik-talim-boyicha-xalqaro-konferensiyada-ishtiroki&quot;,
            &quot;image&quot;: &quot;posts/post5.jpg&quot;,
            &quot;published_at&quot;: &quot;2025-12-08 21:59:33&quot;,
            &quot;views_count&quot;: 5,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;slug&quot;: &quot;news&quot;
            }
        },
        {
            &quot;id&quot;: 6,
            &quot;category_id&quot;: 1,
            &quot;title&quot;: null,
            &quot;content&quot;: null,
            &quot;slug&quot;: &quot;biologiya-fakultetida-tabiiy-resurslardan-oqilona-foydalanish-mavzusida-ilmiy-amaliy-konferensiya-otkazildi&quot;,
            &quot;image&quot;: &quot;posts/post6.jpg&quot;,
            &quot;published_at&quot;: &quot;2025-12-08 21:59:33&quot;,
            &quot;views_count&quot;: 7,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;slug&quot;: &quot;news&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-posts-latest" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-posts-latest"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-posts-latest"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-posts-latest" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-posts-latest">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-posts-latest" data-method="GET"
      data-path="api/v1/posts/latest"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-posts-latest', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-posts-latest"
                    onclick="tryItOut('GETapi-v1-posts-latest');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-posts-latest"
                    onclick="cancelTryOut('GETapi-v1-posts-latest');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-posts-latest"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/posts/latest</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-posts-latest"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-posts-latest"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

    <h3>Response</h3>
    <h4 class="fancy-heading-panel"><b>Response Fields</b></h4>
    <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>success</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Operation success status</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>message</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Response message</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>data</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>List of latest posts</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post ID</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Category ID</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post slug (unique identifier)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post title (translated)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post content (translated)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>string|null</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post image path</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>published_at</code></b>&nbsp;&nbsp;
<small>string|null</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post publication timestamp (ISO 8601 format)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>views_count</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Number of post views</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>created_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post creation timestamp (ISO 8601 format)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>updated_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post last update timestamp (ISO 8601 format)</p>
                    </div>
                                    </details>
        </div>
                        <h2 id="posts-GETapi-v1-posts-all">Get all posts</h2>

<p>
</p>

<p>Retrieve all blog posts with pagination.</p>

<span id="example-requests-GETapi-v1-posts-all">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/posts/all" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/posts/all"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-posts-all">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;All posts retrieved successfully&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;category_id&quot;: 1,
            &quot;title&quot;: null,
            &quot;content&quot;: null,
            &quot;slug&quot;: &quot;qozon-federal-universiteti-vakillari-qoraqalpoq-davlat-universitetida&quot;,
            &quot;image&quot;: &quot;posts/post1.jpg&quot;,
            &quot;published_at&quot;: &quot;2025-12-08 21:59:33&quot;,
            &quot;views_count&quot;: 12,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;slug&quot;: &quot;news&quot;
            }
        },
        {
            &quot;id&quot;: 2,
            &quot;category_id&quot;: 1,
            &quot;title&quot;: null,
            &quot;content&quot;: null,
            &quot;slug&quot;: &quot;turkmanistonlik-olimlar-talabalar-bilan-uchrashdi&quot;,
            &quot;image&quot;: &quot;posts/post2.jpg&quot;,
            &quot;published_at&quot;: &quot;2025-12-08 21:59:33&quot;,
            &quot;views_count&quot;: 8,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;slug&quot;: &quot;news&quot;
            }
        },
        {
            &quot;id&quot;: 3,
            &quot;category_id&quot;: 1,
            &quot;title&quot;: null,
            &quot;content&quot;: null,
            &quot;slug&quot;: &quot;xalqaro-hamkorlik&quot;,
            &quot;image&quot;: &quot;posts/post3.jpg&quot;,
            &quot;published_at&quot;: &quot;2025-12-08 21:59:33&quot;,
            &quot;views_count&quot;: 15,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;slug&quot;: &quot;news&quot;
            }
        },
        {
            &quot;id&quot;: 4,
            &quot;category_id&quot;: 1,
            &quot;title&quot;: null,
            &quot;content&quot;: null,
            &quot;slug&quot;: &quot;qduda-soha-mutaxassislari-bilan-uchrashuv-otkazildi&quot;,
            &quot;image&quot;: &quot;posts/post4.jpg&quot;,
            &quot;published_at&quot;: &quot;2025-12-08 21:59:33&quot;,
            &quot;views_count&quot;: 20,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;slug&quot;: &quot;news&quot;
            }
        },
        {
            &quot;id&quot;: 5,
            &quot;category_id&quot;: 1,
            &quot;title&quot;: null,
            &quot;content&quot;: null,
            &quot;slug&quot;: &quot;fuqarolik-va-biznes-huquqi-kafedrasi-vakillarining-yuridik-klinik-talim-boyicha-xalqaro-konferensiyada-ishtiroki&quot;,
            &quot;image&quot;: &quot;posts/post5.jpg&quot;,
            &quot;published_at&quot;: &quot;2025-12-08 21:59:33&quot;,
            &quot;views_count&quot;: 5,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;slug&quot;: &quot;news&quot;
            }
        },
        {
            &quot;id&quot;: 6,
            &quot;category_id&quot;: 1,
            &quot;title&quot;: null,
            &quot;content&quot;: null,
            &quot;slug&quot;: &quot;biologiya-fakultetida-tabiiy-resurslardan-oqilona-foydalanish-mavzusida-ilmiy-amaliy-konferensiya-otkazildi&quot;,
            &quot;image&quot;: &quot;posts/post6.jpg&quot;,
            &quot;published_at&quot;: &quot;2025-12-08 21:59:33&quot;,
            &quot;views_count&quot;: 7,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;slug&quot;: &quot;news&quot;
            }
        },
        {
            &quot;id&quot;: 7,
            &quot;category_id&quot;: 4,
            &quot;title&quot;: null,
            &quot;content&quot;: null,
            &quot;slug&quot;: &quot;diqqat-elon&quot;,
            &quot;image&quot;: null,
            &quot;published_at&quot;: &quot;2025-11-28 00:00:00&quot;,
            &quot;views_count&quot;: 0,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 4,
                &quot;slug&quot;: &quot;events&quot;
            }
        },
        {
            &quot;id&quot;: 8,
            &quot;category_id&quot;: 4,
            &quot;title&quot;: null,
            &quot;content&quot;: null,
            &quot;slug&quot;: &quot;qosimov-xasanboy-phd-himoyasi&quot;,
            &quot;image&quot;: &quot;event1.jpg&quot;,
            &quot;published_at&quot;: &quot;2025-11-17 00:00:00&quot;,
            &quot;views_count&quot;: 0,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 4,
                &quot;slug&quot;: &quot;events&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-posts-all" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-posts-all"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-posts-all"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-posts-all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-posts-all">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-posts-all" data-method="GET"
      data-path="api/v1/posts/all"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-posts-all', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-posts-all"
                    onclick="tryItOut('GETapi-v1-posts-all');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-posts-all"
                    onclick="cancelTryOut('GETapi-v1-posts-all');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-posts-all"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/posts/all</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-posts-all"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-posts-all"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

    <h3>Response</h3>
    <h4 class="fancy-heading-panel"><b>Response Fields</b></h4>
    <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>success</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Operation success status</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>message</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Response message</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>data</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>List of all posts</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post ID</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Category ID</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post slug (unique identifier)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post title (translated)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post content (translated)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>string|null</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post image path</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>published_at</code></b>&nbsp;&nbsp;
<small>string|null</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post publication timestamp (ISO 8601 format)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>views_count</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Number of post views</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>created_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post creation timestamp (ISO 8601 format)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>updated_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post last update timestamp (ISO 8601 format)</p>
                    </div>
                                    </details>
        </div>
                        <h2 id="posts-GETapi-v1-posts-category--id-">Get posts by category</h2>

<p>
</p>

<p>Retrieve all posts belonging to a specific category.</p>

<span id="example-requests-GETapi-v1-posts-category--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/posts/category/17" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/posts/category/17"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-posts-category--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Category posts retrieved successfully&quot;,
    &quot;data&quot;: []
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Category not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-posts-category--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-posts-category--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-posts-category--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-posts-category--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-posts-category--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-posts-category--id-" data-method="GET"
      data-path="api/v1/posts/category/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-posts-category--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-posts-category--id-"
                    onclick="tryItOut('GETapi-v1-posts-category--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-posts-category--id-"
                    onclick="cancelTryOut('GETapi-v1-posts-category--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-posts-category--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/posts/category/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-posts-category--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-posts-category--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-v1-posts-category--id-"
               value="17"
               data-component="url">
    <br>
<p>Category ID Example: <code>17</code></p>
            </div>
                    </form>

    <h3>Response</h3>
    <h4 class="fancy-heading-panel"><b>Response Fields</b></h4>
    <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>success</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Operation success status</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>message</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Response message</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>data</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>List of posts in the category</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post ID</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Category ID</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post slug (unique identifier)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post title (translated)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post content (translated)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>string|null</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post image path</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>published_at</code></b>&nbsp;&nbsp;
<small>string|null</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post publication timestamp (ISO 8601 format)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>views_count</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Number of post views</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>created_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post creation timestamp (ISO 8601 format)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>updated_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post last update timestamp (ISO 8601 format)</p>
                    </div>
                                    </details>
        </div>
                        <h2 id="posts-GETapi-v1-posts-event-latest">Get latest event posts</h2>

<p>
</p>

<p>Retrieve the most recent event announcements (limited to latest 6).</p>

<span id="example-requests-GETapi-v1-posts-event-latest">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/posts/event/latest" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/posts/event/latest"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-posts-event-latest">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Latest event posts retrieved successfully&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 7,
            &quot;category_id&quot;: 4,
            &quot;title&quot;: null,
            &quot;content&quot;: null,
            &quot;slug&quot;: &quot;diqqat-elon&quot;,
            &quot;image&quot;: null,
            &quot;published_at&quot;: &quot;2025-11-28 00:00:00&quot;,
            &quot;views_count&quot;: 0,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 4,
                &quot;slug&quot;: &quot;events&quot;
            }
        },
        {
            &quot;id&quot;: 8,
            &quot;category_id&quot;: 4,
            &quot;title&quot;: null,
            &quot;content&quot;: null,
            &quot;slug&quot;: &quot;qosimov-xasanboy-phd-himoyasi&quot;,
            &quot;image&quot;: &quot;event1.jpg&quot;,
            &quot;published_at&quot;: &quot;2025-11-17 00:00:00&quot;,
            &quot;views_count&quot;: 0,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 4,
                &quot;slug&quot;: &quot;events&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-posts-event-latest" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-posts-event-latest"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-posts-event-latest"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-posts-event-latest" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-posts-event-latest">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-posts-event-latest" data-method="GET"
      data-path="api/v1/posts/event/latest"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-posts-event-latest', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-posts-event-latest"
                    onclick="tryItOut('GETapi-v1-posts-event-latest');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-posts-event-latest"
                    onclick="cancelTryOut('GETapi-v1-posts-event-latest');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-posts-event-latest"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/posts/event/latest</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-posts-event-latest"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-posts-event-latest"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

    <h3>Response</h3>
    <h4 class="fancy-heading-panel"><b>Response Fields</b></h4>
    <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>success</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Operation success status</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>message</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Response message</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>data</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>List of latest event posts</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post ID</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Category ID</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post slug (unique identifier)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post title (translated)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post content (translated)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>string|null</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post image path</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>published_at</code></b>&nbsp;&nbsp;
<small>string|null</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post publication timestamp (ISO 8601 format)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>views_count</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Number of post views</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>created_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post creation timestamp (ISO 8601 format)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>updated_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post last update timestamp (ISO 8601 format)</p>
                    </div>
                                    </details>
        </div>
                        <h2 id="posts-GETapi-v1-posts-event-all">Get all event posts</h2>

<p>
</p>

<p>Retrieve all event announcements with pagination.</p>

<span id="example-requests-GETapi-v1-posts-event-all">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/posts/event/all" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/posts/event/all"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-posts-event-all">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;All event posts retrieved successfully&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 7,
            &quot;category_id&quot;: 4,
            &quot;title&quot;: null,
            &quot;content&quot;: null,
            &quot;slug&quot;: &quot;diqqat-elon&quot;,
            &quot;image&quot;: null,
            &quot;published_at&quot;: &quot;2025-11-28 00:00:00&quot;,
            &quot;views_count&quot;: 0,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 4,
                &quot;slug&quot;: &quot;events&quot;
            }
        },
        {
            &quot;id&quot;: 8,
            &quot;category_id&quot;: 4,
            &quot;title&quot;: null,
            &quot;content&quot;: null,
            &quot;slug&quot;: &quot;qosimov-xasanboy-phd-himoyasi&quot;,
            &quot;image&quot;: &quot;event1.jpg&quot;,
            &quot;published_at&quot;: &quot;2025-11-17 00:00:00&quot;,
            &quot;views_count&quot;: 0,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 4,
                &quot;slug&quot;: &quot;events&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-posts-event-all" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-posts-event-all"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-posts-event-all"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-posts-event-all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-posts-event-all">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-posts-event-all" data-method="GET"
      data-path="api/v1/posts/event/all"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-posts-event-all', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-posts-event-all"
                    onclick="tryItOut('GETapi-v1-posts-event-all');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-posts-event-all"
                    onclick="cancelTryOut('GETapi-v1-posts-event-all');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-posts-event-all"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/posts/event/all</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-posts-event-all"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-posts-event-all"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

    <h3>Response</h3>
    <h4 class="fancy-heading-panel"><b>Response Fields</b></h4>
    <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>success</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Operation success status</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>message</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Response message</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>data</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>List of all event posts</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post ID</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Category ID</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post slug (unique identifier)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post title (translated)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post content (translated)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>string|null</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post image path</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>published_at</code></b>&nbsp;&nbsp;
<small>string|null</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post publication timestamp (ISO 8601 format)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>views_count</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Number of post views</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>created_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post creation timestamp (ISO 8601 format)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>updated_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Post last update timestamp (ISO 8601 format)</p>
                    </div>
                                    </details>
        </div>
                    <h1 id="statistics">Statistics</h1>

    <p>Managing university statistics and metrics</p>

                                <h2 id="statistics-GETapi-v1-stats">Get all statistics</h2>

<p>
</p>

<p>Retrieve a list of all university statistics with their counts and translated titles.</p>

<span id="example-requests-GETapi-v1-stats">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/stats" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/stats"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-stats">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Statistics retrieved successfully&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;count&quot;: 82,
            &quot;title&quot;: &quot;Areas of study&quot;,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;count&quot;: 1072,
            &quot;title&quot;: &quot;Faculty members&quot;,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;count&quot;: 27330,
            &quot;title&quot;: &quot;Students&quot;,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;count&quot;: 53,
            &quot;title&quot;: &quot;Number of classrooms&quot;,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;count&quot;: 17,
            &quot;title&quot;: &quot;Number of faculties&quot;,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;count&quot;: 265,
            &quot;title&quot;: &quot;Doctoral students&quot;,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-stats" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-stats"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-stats"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-stats" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-stats">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-stats" data-method="GET"
      data-path="api/v1/stats"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-stats', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-stats"
                    onclick="tryItOut('GETapi-v1-stats');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-stats"
                    onclick="cancelTryOut('GETapi-v1-stats');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-stats"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/stats</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

    <h3>Response</h3>
    <h4 class="fancy-heading-panel"><b>Response Fields</b></h4>
    <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>success</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Operation success status</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>message</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Response message</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>data</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>List of statistics</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Statistic ID</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>count</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Statistical count/number</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Statistic title (translated)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>created_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Statistic creation timestamp (ISO 8601 format)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>updated_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Statistic last update timestamp (ISO 8601 format)</p>
                    </div>
                                    </details>
        </div>
                    <h1 id="videos">Videos</h1>

    <p>Managing video content and media</p>

                                <h2 id="videos-GETapi-v1-videos">Get all videos</h2>

<p>
</p>

<p>Retrieve a list of all published videos with translated titles.</p>

<span id="example-requests-GETapi-v1-videos">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/videos" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/videos"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-videos">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Videos retrieved successfully&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;title&quot;: &quot;Karakalpak state university&quot;,
            &quot;url&quot;: &quot;https://www.youtube.com/watch?v=F-ql5OMdMdo&amp;t=136s&quot;,
            &quot;published_at&quot;: &quot;2025-12-08 21:59:33&quot;,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;title&quot;: &quot;Berdakh Karakalpak State University: Modern Education, Competitive Future!&quot;,
            &quot;url&quot;: &quot;https://www.youtube.com/watch?v=wlRMcv_zQew&quot;,
            &quot;published_at&quot;: &quot;2025-12-08 21:59:33&quot;,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-videos" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-videos"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-videos"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-videos" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-videos">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-videos" data-method="GET"
      data-path="api/v1/videos"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-videos', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-videos"
                    onclick="tryItOut('GETapi-v1-videos');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-videos"
                    onclick="cancelTryOut('GETapi-v1-videos');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-videos"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/videos</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-videos"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-videos"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

    <h3>Response</h3>
    <h4 class="fancy-heading-panel"><b>Response Fields</b></h4>
    <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>success</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Operation success status</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>message</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Response message</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>data</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>List of videos</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Video ID</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Video URL</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Video title (translated)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>published_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Video publication timestamp (ISO 8601 format)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>created_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Video creation timestamp (ISO 8601 format)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>updated_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Video last update timestamp (ISO 8601 format)</p>
                    </div>
                                    </details>
        </div>
                        <h2 id="videos-GETapi-v1-videos-latest">Get latest videos</h2>

<p>
</p>

<p>Retrieve the most recent published videos (limited to latest 5).</p>

<span id="example-requests-GETapi-v1-videos-latest">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/videos/latest" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/videos/latest"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-videos-latest">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Latest videos retrieved successfully&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;title&quot;: &quot;Karakalpak state university&quot;,
            &quot;url&quot;: &quot;https://www.youtube.com/watch?v=F-ql5OMdMdo&amp;t=136s&quot;,
            &quot;published_at&quot;: &quot;2025-12-08 21:59:33&quot;,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;title&quot;: &quot;Berdakh Karakalpak State University: Modern Education, Competitive Future!&quot;,
            &quot;url&quot;: &quot;https://www.youtube.com/watch?v=wlRMcv_zQew&quot;,
            &quot;published_at&quot;: &quot;2025-12-08 21:59:33&quot;,
            &quot;created_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-08T16:59:33.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-videos-latest" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-videos-latest"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-videos-latest"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-videos-latest" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-videos-latest">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-videos-latest" data-method="GET"
      data-path="api/v1/videos/latest"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-videos-latest', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-videos-latest"
                    onclick="tryItOut('GETapi-v1-videos-latest');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-videos-latest"
                    onclick="cancelTryOut('GETapi-v1-videos-latest');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-videos-latest"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/videos/latest</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-videos-latest"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-videos-latest"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

    <h3>Response</h3>
    <h4 class="fancy-heading-panel"><b>Response Fields</b></h4>
    <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>success</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Operation success status</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>message</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Response message</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>data</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>List of latest videos</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Video ID</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Video URL</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Video title (translated)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>published_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Video publication timestamp (ISO 8601 format)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>created_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Video creation timestamp (ISO 8601 format)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>updated_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Video last update timestamp (ISO 8601 format)</p>
                    </div>
                                    </details>
        </div>
                

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
