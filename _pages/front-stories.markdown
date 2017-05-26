---
layout: page
title: Front End User Stories
permalink: /front-stories/
---

## After Server API is implemented

 - [x] implement vue-router
 - [x] documentation index page
 - [ ] rebuild current views with new theme
 
---

## Viewing a guide -- `/guide/{guideid}`

### As a user...
- [x] When I view a guide, where each step number is listed, I should only see the arrow icon when I hover over the step number. `May 9`
- [ ] When I view a guide, when I click the options dropdown link in the upper right corner and then click the history link, I should be brought to the guide edit history screen (/guide/history/{guideid}).

---

### As an unauthenticated user...
- [ ] When I view a guide, when I click the options dropdown link in the upper right corner and then click the Save to Favorites link, if I am not logged in, I should see a login popup modal.

---

### As an authenticated user...
- [ ] When I view a guide, then click the options dropdown link in the upper right corner, then click the Save to Favorites link, I should see a success flash message: {guide title} has been added to favorites.

---

## Editing a guide

### When I edit a guide introduction -- `/guide/intro/{guideid}`
- [x] there should be no css spacing issues. `May 9`
- [x] i should see a markdown text editor for the Introduction textarea. `May 9`

---

### When I edit a guide Step -- `/guide/steps/{guideid}/{stepid}`
- [x] there should be no css spacing issues. `May 9`
- [x] I should see a save button underneath the list of sub steps. `May 9`
- [x] I should see a step delete button. `May 9`
- [x] I should see an insert step button. `May 9`
- [ ] when i click the insert step button, a new step should be inserted after the current one and i should see a blank form.
- [x] the steps grid should be rearrangeable when i click the Rearrange Steps link. `May 9`
- [x] after i rearrange the step icons, i should be able to save or cancel. `May 9`
- [ ] Clicking the yellow plus icon should allow me to create a new step.
- [ ] I should be able to drag the image icons to rearrange. **[dragula](https://github.com/bevacqua/dragula)**
- [x] when i click a bullet, i should see a popover that allows me to choose: black, red, orange, yellow, green, light-blue, blue, violet, red caution icon, info icon, reminder icon. `May 9`
- [ ] when i click on the text next to any bullet, i should see a mini markdown editor.
  - [ ] There should be a left and right arrow to set the indent level
    - [ ] the first entry cannot be indented
    - [ ] there are only three levels of indentation (0, 1, 2)
  - [ ] there should be a plus icon to add an entry below the current one.
  - [ ] there should be an x icon to delete the entry.
  - [ ] there should be a maximum of 350 characters with a display of characters/characters remaining
  
---

## Document history page

- [ ] I should see edits ordered by date sections
- [ ] I should see time of edit, who editied it, a link to the edit and whether it was accepted or denied by an administrator.
- [ ] I should see a section that will link to a changes over time page.

