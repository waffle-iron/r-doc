---
layout: post
title:  "Wednesday May 24"
date:   2017-05-24 18:00:00
categories: r-doc log entry
---

[back](/r-doc/summaries)

### Progress

I spent a bit of time with my web host [Fortrabbit](https://www.fortrabbit.com/){:target="_blank"} trying to resolve the issue I was having with not being able to update my files on the host. After almost two hours, we were able to resolve it. Sadly, the problem was extremely unique and was being caused on my end. Normally, I would type `git push fortrabbit master` on the command line and all of the files would be beamed up to the server and updated. The solution is for me to append a flag onto the command, so now I type `git push fortrabbit master --no-verify` and I am able to proceed with my work. I created a shell script to handle preventing certain files and directories to be uploaded to my host (directories like `docs`, which houses these log pages; I do not need to store these on the production server). Because of this, you will now see a pattern of commits: the first will say `deploy to fortrabbit`, and the second will say `post fortrabbit deploy`. I like this approach and will continue to use it.

---

### Thoughts 

It was my birthday so not a lot of time devoted to this project. I am happy that I was able to resolve the issue with my host. I also fell behind updating these logs but sure enough, I have a stable foundation to retrace the steps that I have taken in terms of progress.

Something I am becoming more and more concerned about is the amount of fiddling with broken tests. These tests are breaking because of small changes that I am making to the implementation and I now have to consider just how much more time I want to spend writing these tests, or at least the depth in which I consider a passing test. It is important to have a safeguard for any unanticipated consequences to changes I make in the code base, but is it worth my time to have to maintain these test? I'm starting the believe that answer is no. But since this is my first time actually using the process of test-driven development, I am learning the ins and outs of the process. I think my next step is to write the simplest assertions possible (or even skip writing them) to see what effect this will have on my progress moving forward.

---

### Daily Commits

- [Changed results to sort by latest](https://github.com/roberthamel/r-doc/commit/79b8e62bf08997d44f4be98afa6281985afc3d80){:target="_blank"}
- [add vue-typeahead; remove unnecessary files](https://github.com/roberthamel/r-doc/commit/38f7b0b19ef778f0b38cc3c8546ae3668de02c89){:target="_blank"}
- [Changed migrations](https://github.com/roberthamel/r-doc/commit/f0bd816ceda96913d3d94c211f26ceb54726203f){:target="_blank"}
- [Change gitignore](https://github.com/roberthamel/r-doc/commit/fbf1a02391174522ad926342e3dcffa6d5aa5fff){:target="_blank"}
- [fortrabbit issue solved; add deploy script](https://github.com/roberthamel/r-doc/commit/5b7b8fd708d1f79f961a56c1f906496fa76ff1c5){:target="_blank"}
- [Fixed all tests](https://github.com/roberthamel/r-doc/commit/116ad17ed06e6ff4d940522037f6bcdcf78012ee){:target="_blank"}
- [Merge branch 'master' into theme-guides-pages](https://github.com/roberthamel/r-doc/commit/effafa65b6d3eac4165c314db6058ccceb08157c){:target="_blank"}
- [Travis fix?](https://github.com/roberthamel/r-doc/commit/567b9e5901a278d147c4701d6838be2dd065acc0){:target="_blank"}
- [Merge pull request #5 from roberthamel/theme-guides-pages](https://github.com/roberthamel/r-doc/commit/3e1e9053de36ad57f36c41a9b60c244c64e9bb57){:target="_blank"}
- [deploy to fortrabbit](https://github.com/roberthamel/r-doc/commit/68408ad6fcb771a5356d69c85c78c6945945fe9d){:target="_blank"}
- [post fortrabbit deploy](https://github.com/roberthamel/r-doc/commit/69205f1335d9af9d17860d7f7ab53fa3ad1f3319){:target="_blank"}
- [deploy to fortrabbit](https://github.com/roberthamel/r-doc/commit/112dc57011658b24286a1954f737b7c3fc83a7f6){:target="_blank"}
- [post fortrabbit deploy](https://github.com/roberthamel/r-doc/commit/74c9a383d40c27e5e8baf79c68b11766f462a0c4){:target="_blank"}