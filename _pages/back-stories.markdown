---
layout: page
title: Back End User Stories
permalink: /back-stories/
---

[DB Design](http://dbdesigner.net/designer/schema/89573){:target="_blank"}

- [x] establish mockup pages url and redirect to them when visiting '/'

---

#### Database Migrations
- [x] create images migration and test db
- [x] modify users migration and test db
- [x] create notifications and test db
- [x] create announcements and test db
- [x] create team users and test db
- [x] create invitations and test db
- [x] create statuses migration and test db
- [x] create revisions migration and test db
- [x] create types migration and test db
- [x] create devices migration and test db
- [x] create categories migration and test db
- [x] create datatypes migration and test db
- [x] create guides migration and test db
- [x] create steps migration and test db
- [x] create lines migration and test db
- [x] test relationships
  - [x] user has one image (image belongs to one user)
  - [x] user has many notifications (notification belongs to one user)
  - [x] user has many announcements (announcements belong to many users)
  - [x] user has many invitations (invitations belong to many users)
  - [x] team has many users (users belong to many teams)
  - [x] team has one image (image can belong to many teams)
  - [x] guide has one image (image can belong to many guides)
  - [x] guide has one datatype (datatype belongs to many guides)
  - [x] guide has one category (categories belong to many guides)
  - [x] guide has one type (type belongs to many guides)
  - [x] guide has one device (device belongs to many guides)
  - [x] guide has many revisions (revision belongs to one guides)
  - [x] step has many revisions (revision belongs to one steps)
  - [x] step has many images (image can belong to many steps)
  - [x] step has many lines (line belongs to one step)
  - [x] revision has one status (status belongs to many revisions)

---

#### Api Tests
- [ ] test guides resource