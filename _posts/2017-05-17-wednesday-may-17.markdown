---
layout: post
title:  "Wednesday May 17"
date:   2017-05-17 18:00:00
categories: r-doc log entry
---

[back](/r-doc/summaries)

### Progress

I went to update my production host with the most recent version of my site and discovered that the host was not cooperating. I will need to contact Fortrabbit's support in order to resolve the problem. It looks like they are a really small operation, and since I am on their most basic plan, the only support I can receive is through an IM dialog box built into their website. They are located in Europe so I will have to wait to resolve the issue until tomorrow. The next step I am taking is to create all of the database seed files that I will need in order to have data for a working prototype. It also gives me the chance to see if I have any missing or extra fields in my migration files.

I also decided that Notification, Announcements, and Invitations are beyond the scope of what I will require for a working prototype. I believe that it will be worth my while to wait until I know the initial API is functioning correctly before focusing on new features such as this.

---

### Thoughts 

Something that is prone to happen when there is an error in any step of the process of managing an application is the possibility of breaking either how the site renders, or its configuration. I my attempts to problem-solve the hosting issue on my end, I came dangerously close to breaking my site. Thankfully, because of the way that I am using revision control, any mistakes that I made were easily reversible. Hard lessons learned are definitely to be avoided. Having to go back and re-do work can be seen as a form of torture and can really add stress unnecessarily. 

---

### Daily Commits

- [Change relation between guides and types](https://github.com/roberthamel/r-doc/commit/f8214472794c41c3aa754a5b5538339fbdb56be4){:target="_blank"}
- [Commented out some tests](https://github.com/roberthamel/r-doc/commit/de4f99bf73135f942bb79778c60d729625428482){:target="_blank"}
- [Basic seeds finished](https://github.com/roberthamel/r-doc/commit/3200ca0d2bef1371932fa8fc1fe96ef6d45435d7){:target="_blank"}
- [Guides seed is complete](https://github.com/roberthamel/r-doc/commit/021a6e79284b5b65125eb00f5871838ef2435ce6){:target="_blank"}
- [a_guide_has_many_steps; a_step_belongs_to_a_guide](https://github.com/roberthamel/r-doc/commit/553869bbb54613d843ff71a76c7145b2ec07cbf3){:target="_blank"}