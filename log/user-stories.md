# User Stories

## Front End

### Viewing a guide -- /guide/{guideid}

#### As a user...
- [x] When I view a guide, where each step number is listed, I should only see the arrow icon when I hover over the step number.
- [ ] When I view a guide, when I click the options dropdown link in the upper right corner and then click the history link, I should be brought to the guide edit history screen (/guide/history/{guideid}).

#### As an unauthenticated user...
- [ ] When I view a guide, when I click the options dropdown link in the upper right corner and then click the Save to Favorites link, if I am not logged in, I should see a login popup modal.

#### As an authenticated user...
- [ ] When I view a guide, then click the options dropdown link in the upper right corner, then click the Save to Favorites link, I should see a success flash message: {guide title} has been added to favorites.

### Editing a guide \[as an authenticated user\]

#### When I edit a guide introduction -- /guide/intro/{guideid}
- [ ] there should be no css spacing issues.
- [x] i should see a markdown text editor for the Introduction textarea.

#### When I edit a guide Step -- /guide/steps/{guideid}/{stepid}
- [ ] there should be no css spacing issues.
- [ ] I should see a save button underneath the list of sub steps.
- [ ] I should see a step delete button.
- [ ] I should see an insert step button.
- [ ] when i click the insert step button, a new step should be inserted after the current one and i should see a blank form.
- [ ] the steps grid should be rearrangeable when i click the Rearrange Steps link.
- [ ] after i rearrange the step icons, i should be able to save or cancel.
- [ ] Clicking the yellow plus icon should allow me to create a new step.
- [ ] I should be able to drag the image icons to rearrange.
- [ ] when i click a bullet, i should see a popover that allows me to choose:
  - [ ] Black bullet
  - [ ] Red bullet
  - [ ] Orange bullet
  - [ ] Yellow bullet
  - [ ] Green bullet
  - [ ] Light blue bullet
  - [ ] Blue bullet
  - [ ] Violet bullet
  - [ ] Red caution icon
  - [ ] info icon
  - [ ] reminder icon
- [ ] when i click on the text next to any bullet, i should see a mini markdown editor.
  - [ ] There should be a left and right arrow to set the indent level
    - [ ] the first entry cannot be indented
    - [ ] there are only three levels of indentation (0, 1, 2)
  - [ ] there should be a plus icon to add an entry below the current one.
  - [ ] there should be an x icon to delete the entry.
  - [ ] there should be a maximum of 350 characters with a display of characters/characters remaining

#### When I view any history page
#### When I view the guide history page -- /guide/hisory/intro/{guideid} or /guide/history/step/{guideid}/{stepid}
#### When I view the changes over time page -- /guide/history/{guideid}
- [ ] I should see edits ordered by date sections
- [ ] I should see time of edit, who editied it, a link to the edit and whether it was accepted or denied by an administrator.
- [ ] I should see a section that will link to a changes over time page.

## Back End

### Favorites panel \[as an authenticated user\]

- [ ] 
