---
layout: page
title: Weekly Summaries
permalink: /summaries/
---

## Week 3

...

---

### Log Entries

- [Sunday](/r-doc/2017/05/sunday-may-21)
- [Monday](/r-doc/2017/05/monday-may-22)

---

## Week 2

I spent a majority of the week planning, testing, and implementing the database that I will need for this project. This is the first project that I have worked on of this scale and I'm finding that besides learning a lot in a compressed amount of time, I've been having to think a little bit differently about the tiny details that are involved with making this work fluently. I definitely made sure to write tests to ensure that what I am creating is actually working. I'm still finding that it takes a bit of extra time (and coding) to make this work, but I am now seeing why test-driven development is considered a crucial component of programming, these days.

Unfortunately [r-doc.com](https://www.r-doc.com) looks exactly the same as it did last week and there isn't anything I'm going to be able to do to update it this weekend. Please be sure to look through the log that I have kept this week to get a grasp of what work I have done. I would say about 95% of it was behind the scenes work anyway, but having something to display is a bit difficult. I will continue to work on it each day regardless.

By Thursday, I had finished with the initial database implementation. I wrote tests to ensure that both the database structure and relationships were working properly. Once I finished with that, I did a few tweaks to the front end and began to set myself up to begin tesing the applications interaction with the database. Specifically the create, read, update, and delete methodology. This proved to be difficult at the start, but I believe that I have now found my approach and am working away writing tests and visually proving that things are working the way that I intend. It's a pretty rewarding experience.

---

### Log Entries

- [Sunday](/r-doc/2017/05/sunday-may-14)
- [Monday](/r-doc/2017/05/monday-may-15)
- [Tuesday](/r-doc/2017/05/tuesday-may-16)
- [Wednesday](/r-doc/2017/05/wednesday-may-17)
- [Thursday](/r-doc/2017/05/thursday-may-18)
- [Friday](/r-doc/2017/05/friday-may-19)

---

## Week 1

### Summary

I will be writing this summary on Friday of each week. Log entries will be created the day after each day. If you see the current day is empty, it will be updated sometime tomorrow.

I got off to a dramatic start with this project. I spent the first couple of days creating the front-end templates. I used data and styling from the [iFixit](https://ifixit.com) website since this is ideally the functionality that I wish to capture. By the end of the week I was able to generate my own random data to replace data from the iFixit site (see [Thursday's](/r-doc/2017/05/thursday-may-11) log).

I also setup this site to be used as log storage and keep track of my user stories so that I can sketch out what details need to be implemented on the site. I have a couple of tweaks left with this site so that it renders correctly on mobile, but overall I am happy with the look and feel of it.

Next was purchasing a domain name and signing up for hosting. It can be found at [r-doc.com](https://www.r-doc.com) and has a temporary unauthenticated example of all that I have accomplished so far this week. I'm not sure how I'm going to handle authentication in the future regarding how to display new functionality that I have created, but I believe that I will be able to find a solution.

Continuous integration was configured to allow me to write server-side unit tests and utilize a [third-party](https://travis-ci.org) to run my tests and determine if my site is ready to be deployed to my hosted production environment. I have yet to configure Travis to automatically deploy, but that is on my todo list. Being able to automatically deploy to production upon successful testing of my builds will be a nice time-saver, i anticipate.

Next up for me is to implement a new front-end theme using a yet to be determined VueJS specific package that will utilize Google's Material Design specifications. Those same specs are used in the design of this site and I really like the modern look and feel. I also think it's time to begin focusing on the back-end database architecture and connecting it to the front-end. This part of development is new to me so I'm guessing that I will learn quite a bit, and make a few mistakes, in the process.

---

### Log Entries

- [First Entry](/r-doc/2017/05/first-entry)
- [Monday](/r-doc/2017/05/monday-may-8)
- [Tuesday](/r-doc/2017/05/tuesday-may-9)
- [Wednesday](/r-doc/2017/05/wednesday-may-10)
- [Thursday](/r-doc/2017/05/thursday-may-11)
- [Friday](/r-doc/2017/05/friday-may-12)

---