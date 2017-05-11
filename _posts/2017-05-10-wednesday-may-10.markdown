---
layout: post
title:  "Wednesday May 10, 2017"
date:   2017-05-10 18:00:00
categories: r-doc log entry
---

### Progress

I took a break from front-end implementation today. I setup this Jekyll site as a document of my progress. I purchased a domain name and subscribed to a hosting service. Finally, I integrated my git repository with Travis CI to ensure that my site is working as expected.

---

### Thoughts 

Now that I have continuous integration in place, I think it would be wise to take a more test-driven approach to working on this site. While it is very rewarding to hack away at an interface and see it come to life, there have been a couple of instances already where I broke something different on the site trying to make changes. Best I take a cautious and structured approach; even if it will require more coding and time.

---

### Daily Commits

1. [setup jekyll docs site; install needed packages](https://github.com/roberthamel/r-doc/commit/733a47b1386483e090370e16c0969f9df8390578){:target="_blank"}
2. [update readme](https://github.com/roberthamel/r-doc/commit/64b818822436615a8f3b08acb4989ee563c772cf){:target="_blank"}
3. [remove license file (can now be found in readme)](https://github.com/roberthamel/r-doc/commit/b85f086d6595411de01803718cfeeb4e3069a245){:target="_blank"}
4. [test travis-ci configuration](https://github.com/roberthamel/r-doc/commit/e196a9f235a40d3d9166380602cc3340dfae4761){:target="_blank"}
5. [fix travis database reference](https://github.com/roberthamel/r-doc/commit/d5332bb8d91121df5ccc54bf29a9423c2af37a81){:target="_blank"}
6. [require laravel/dusk; tweak travis config](https://github.com/roberthamel/r-doc/commit/d20fa490a5c8112e9aebe706d5db589a90bae244){:target="_blank"}
7. [make sure dusk works](https://github.com/roberthamel/r-doc/commit/08e2bcb65d4dab1435d19fb6b53babffab4687a7){:target="_blank"}
8. **12 failing commits as I try to configure Travis CI correctly.**
9. [giving up on laravel dusk, local test will suffice. unit test are most important](https://github.com/roberthamel/r-doc/commit/9ceb60cecac6bf5f053498dcf2ad263d3d194daf){:target="_blank"}
10. [temporarily allow register](https://github.com/roberthamel/r-doc/commit/d22785dcd9b5f87e438f5d8ae034bc77a52a50b3){:target="_blank"}
11. [force https attempt](https://github.com/roberthamel/r-doc/commit/940d71866008f58e10494d56e3835735f2bed4dc){:target="_blank"}
12. [revert allow register](https://github.com/roberthamel/r-doc/commit/d5374345c9f0e98be09763f1399d22e412e4d272){:target="_blank"}