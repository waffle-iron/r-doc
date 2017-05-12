---
layout: post
title:  "Thursday May 11, 2017"
date:   2017-05-11 18:00:00
categories: r-doc log entry
---

[back](/r-doc/summaries)

### Screenshots

[![Guide Display]({{site.baseurl}}/images/week1/05-11-guide-display.png){:width="200" class="img-responsive img-border"}]({{site.baseurl}}/images/week1/05-11-guide-display.png){:target="_blank"}
[![Guide Intro Edit]({{site.baseurl}}/images/week1/05-11-guide-intro-edit.png){:width="200" class="img-responsive img-border"}]({{site.baseurl}}/images/week1/05-11-guide-intro-edit.png){:target="_blank"}
[![Guide Step Edit]({{site.baseurl}}/images/week1/05-11-guide-step-edit.png){:width="200" class="img-responsive img-border"}]({{site.baseurl}}/images/week1/05-11-guide-step-edit.png){:target="_blank"}

### Progress

I did a lot of behind the scenes work today. I overhauled this site with a better theme and constructed most of the content. I then configured my `.htaccess` file so that my webhost will handle all of the various different combinations of urls a user might type into the browsers address bar. I then shifted focus to creating dynamic mock back-end api using a NodeJS package known as [json-server](https://github.com/typicode/json-server){:target="_blank"}. I created a new [repository](https://github.com/roberthamel/json-server-starter){:target="_blank"} to sketch this out since it is a separate entity. 

`json-server` allows you to save your db schema to a `json` file, which I as easily able to convert to a JavaScript object much like the placeholder data I was already using. I no longer want to use data that I grabbed from an existing site. I then had to modify some of the front-end code to use this new data. This also helped me to iron out any logic errors that I had created in my api generator. I now have the ability to view pages with this new data.

---

### Thoughts 

I'm not sure that it was the wisest utilization of my time to explore the `json-server` implementation. Since it is just a placeholder, I still need to do all of the work to get the actual database setup and communicating with the front-end. But for the purposes of moving away from using somebody else's data as an example, this was worth the effort.

---

### Daily Commits

#### r-doc repo

1. [reworking docs; moved all npm dependencies to dev](https://github.com/roberthamel/r-doc/commit/e3e3d8f0e10c06213f0209602ea4d9e8a9ffb83b){:target="_blank"}
2. [change htaccess to force r-doc.com to redirect to www.r-doc.com](https://github.com/roberthamel/r-doc/commit/065f47044d35e393e7aeed06265585828177adcb){:target="_blank"}
3. [server redirect from https://r-doc.com to https://www.r-doc.com](https://github.com/roberthamel/r-doc/commit/25e086d65816de99d75fdd4775b499a3b75e3768){:target="_blank"}
4. [one last try](https://github.com/roberthamel/r-doc/commit/83dc3f6a070bfbe43b32a3696d61c68fb056d5d1){:target="_blank"}
5. [specify domain in htaccess](https://github.com/roberthamel/r-doc/commit/7f5f0fdf6da943f13a38f51dacbf3bcde3e639e4){:target="_blank"}

#### json-server-starter repo

1. [initial commit](https://github.com/roberthamel/json-server-starter/commit/b0ccf82dd47d645d6d1e604172ae6d522d8d7f41){:target="_blank"}
2. [add readme](https://github.com/roberthamel/json-server-starter/commit/66af9c7000d6d54053cb323561269f56f152713f){:target="_blank"}
3. [Fix readme](https://github.com/roberthamel/json-server-starter/commit/c8252bfbfa17a9207049d0c20687c0f480118b25){:target="_blank"}
4. [Fix type](https://github.com/roberthamel/json-server-starter/commit/42c5a7c7ffb80cd20c4780f41fa9604c71e3ce5e){:target="_blank"}
5. [Create example](https://github.com/roberthamel/json-server-starter/commit/778aa50a0ebfdefa6fcecf59228d566cb850cd23){:target="_blank"}
6. [add watch command; update readme](https://github.com/roberthamel/json-server-starter/commit/d6859967438af13266914dc72cf1bbe66ce6f19e){:target="_blank"}
7. [Finish initial db](https://github.com/roberthamel/json-server-starter/commit/65e12cf7821e3b64b6e57a32c4e9a570a2867426){:target="_blank"}
8. [Corrected data structure mistake](https://github.com/roberthamel/json-server-starter/commit/0d63e29016d254b135be322f8bb1487683b33e0f){:target="_blank"}
9. [Teaking minor details](https://github.com/roberthamel/json-server-starter/commit/2a0e61588698fc89c189bc8345a6ea70210ab447){:target="_blank"}