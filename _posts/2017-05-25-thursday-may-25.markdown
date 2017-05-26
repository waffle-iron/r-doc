---
layout: post
title:  "Thursday May 25"
date:   2017-05-25 18:00:00
categories: r-doc log entry
---

[back](/r-doc/summaries)

### Tasks

- [Issue #6](https://github.com/roberthamel/r-doc/issues/6){:target="_blank"}

---

### Screenshots

[![New Theme]({{site.baseurl}}/images/week3/05-25-new-theme.png){:width="200" class="img-responsive img-border"}]({{site.baseurl}}/images/week3/05-25-new-theme.png){:target="_blank"}
[![Pug Template]({{site.baseurl}}/images/week3/05-25-pug-template.png){:width="200" class="img-responsive img-border"}]({{site.baseurl}}/images/week3/05-25-pug-template.png){:target="_blank"}
[![Rendered HTML]({{site.baseurl}}/images/week3/05-25-rendered-html.png){:width="200" class="img-responsive img-border"}]({{site.baseurl}}/images/week3/05-25-rendered-html.png){:target="_blank"}

---

### Progress

I spent the morning catching up on these logs. This helped me get a bit more grounded, which has helped me plow an ideal path forward. I also made great progress on the re-themeing of the front-end pages. The new material design theme looks really nice and I'm getting the hang of using their Vue components to build pages. I figured out a way to filter the list of guides on the front page. This is really nice, I think. In the search bar, when you begin typing, matching document titles will be the only ones displayed. It plays really nicely with the pagination that I implemented too.

---

### Thoughts 

I devised a new workflow for managing tasks and workflow. GitHub offers both issues and projects. I can open an issue
 for the short-term tasks that I hope to accomplish. The issues allow Markdown so I am able to create lists with 
 checkboxes that I can check when I have completed them. A link is provided above if you want to see... Projects are 
 a Kanban style board where I can place issues and categorize them as Pending, In Process, and Complete. This will 
 help me to determine what I want to work on next. Over the next week or so, I will be able to refine this process as
  I am not sure how much detail to put into these issues or how to incorporate it into the existing user stories that
   I have on this site. I'm confident that I will be able to find a balance.

Another interesting programming technique I found was to begin using the `pug` templating language. It's not 
necessarily a language, per se, but preprocessor for HTML. I have already decided to use `stylus` for my CSS 
preprocessor (if you aren't aware, it's much like `less` and `scss`). The screenshots above show what the code looks 
like versus what gets rendered when I compile all of the Vue files together. I think it's pretty neat. There is also 
a screenshot of the new theme I am implementing.

---

### Daily Commits

- [Fix test bug](https://github.com/roberthamel/r-doc/commit/2c5e551383c08ecb7d6a89c6c550537616700201){:target="_blank"}
- [Guides test tweak](https://github.com/roberthamel/r-doc/commit/65c359343690feef4d093ffac3b35a04f5fd2d96){:target="_blank"}
- [Test fix](https://github.com/roberthamel/r-doc/commit/463bd1957f0959a5d1a22b3ba61bf7e5bd55d251){:target="_blank"}
- [Fix test bug](https://github.com/roberthamel/r-doc/commit/2c5e551383c08ecb7d6a89c6c550537616700201){:target="_blank"}
- [Guides test tweak](https://github.com/roberthamel/r-doc/commit/65c359343690feef4d093ffac3b35a04f5fd2d96){:target="_blank"}
- [Test fix](https://github.com/roberthamel/r-doc/commit/463bd1957f0959a5d1a22b3ba61bf7e5bd55d251){:target="_blank"}
- [re-theme search results](https://github.com/roberthamel/r-doc/commit/17e1abe192ac564767613dce1dbfb7b7ab0c3015){:target="_blank"}
- [Refactor index card](https://github.com/roberthamel/r-doc/commit/e0c1d4b7a3eeda6918a8175ba231d7bbb389a4a5){:target="_blank"}
- [Refactor toolbar](https://github.com/roberthamel/r-doc/commit/c1112410e6b934a6387b5e7a998d15e59c0266e6){:target="_blank"}
- [Small toolbar refactor](https://github.com/roberthamel/r-doc/commit/ab32a13dc4c4e36b3a1b6452d86678c6aec77e85){:target="_blank"}
- [Add guide search endpoint](https://github.com/roberthamel/r-doc/commit/f3ef7dde52192262d342aa1bba09f746bc8edab9){:target="_blank"}
- [Create search component; remove npm packages](https://github.com/roberthamel/r-doc/commit/647cb3492b80da3c93dad7b2d65d13f53a8190eb){:target="_blank"}
- [Begin autocomplete implement](https://github.com/roberthamel/r-doc/commit/3f72f4561a940005c45959e19940b4585763e499){:target="_blank"}
- [Search filter implemented](https://github.com/roberthamel/r-doc/commit/13384181cb1806d9ce24502bb9c6c81d2d6eb1f3){:target="_blank"}
- [finish guide page banner](https://github.com/roberthamel/r-doc/commit/2488fdef1abdab860eb941c903a586bc4e2260e0){:target="_blank"}
- [Minor tweaks](https://github.com/roberthamel/r-doc/commit/26c782cfac9cdbac5268cf726c576c0a5b58ca21){:target="_blank"}
- [Add GuideStep component](https://github.com/roberthamel/r-doc/commit/ebbc22251d00a5445e587405f5214dcd44a0dc13){:target="_blank"}
- [Refactor all html to pug](https://github.com/roberthamel/r-doc/commit/44226450b0b0738f2b95552d0dfef0cb09a95f7d){:target="_blank"}
- [Test fix](https://github.com/roberthamel/r-doc/commit/42b461796cc834268991624160be030b2f7f07f7){:target="_blank"}
- [Add component I created a couple of weeks ago](https://github.com/roberthamel/r-doc/commit/0e3f585e4852cb9f8e71177770d3bb4d8e8cbed1){:target="_blank"}
- [Ran yarn upgrade](https://github.com/roberthamel/r-doc/commit/b0a08d0b5efeff5248f250bd2cc6b221352af90b){:target="_blank"}
- [Update component](https://github.com/roberthamel/r-doc/commit/98beed0363e991af18bc1ddeb1bfef09f1b5709d){:target="_blank"}