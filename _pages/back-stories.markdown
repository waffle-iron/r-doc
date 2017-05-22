---
layout: page
title: Back End User Stories
permalink: /back-stories/
---

### Database Entity-Relationship Diagram

#### Screenshots

[![DB ERD]({{site.baseurl}}/images/db/05-22-db-erd.png){:width="200" class="img-responsive img-border"}]({{site.baseurl}}/images/db/05-22-db-erd.png){:target="_blank"}

---

#### Most Recent Database ERD: Must Be Logged In to See.

[dbdesigner.net](http://dbdesigner.net/designer/schema/89573){:target="_blank"}

---

### Server Todo

_NOTE: These are in order by most recent. Should save from having to scroll down the whole page_

#### CRUD Tests
- [ ] test guides
    - [x] read `/api/v1/guides/{guideid}`
    - [x] read `/api/v1/guides`
    - [ ] delete `api/v1/guides`
    - [ ] create `/api/v1/guides`
    - [ ] update `/api/v1/guides/{guideid}`
    - [ ] delete `/api/v1/guides/{guideid}`
- [ ] test steps
- [ ] test lines
- [ ] test revisions
- [ ] test users
    - [ ] username needs to be required
    - [ ] test all optional fields
- [ ] test teams
    - [ ] create, update, delete
- [ ] test statuses
    - [ ] create, update, delete
- [ ] test types
    - [ ] create, update, delete
- [ ] test devices
    - [ ] create, update, delete
- [ ] test categories
    - [ ] create, update, delete
- [ ] test datatypes
    - [ ] create, update, delete
- [ ] test images (do i want to use dropzone?; need image resizing library)

---

#### Remove Down-The-Line Configuration

- [x] remove invitations, notifications, and announcements
    - [x] tests
    - [x] database tables
    
---

#### Database Seeds

- [x] users
- [x] teams
- [x] images
- [x] statuses
- [x] types
- [x] devices
- [x] categories
- [x] datatypes
- [x] guides
- [x] steps
- [x] lines
- [x] revisions

---

#### Database Relationships
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

---

- [x] establish mockup pages url and redirect to them when visiting '/'