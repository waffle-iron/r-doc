const _ = require('lodash');
const Faker = require('faker');

module.exports = {
  randomRange: function(from, to) {
    return Math.floor(Math.random() * to) + from;
  },

  imageThumbAndMedium: function(id, width, height) {
    let category;
    if(id < 10) { category = 'city'; }
    else if(id < 20) { category = 'technics'; id -=10 }
    return 'http://lorempixel.com/'+width+'/'+height+'/'+category+'/'+(id+1);
  },

  generateStepLines: function(qty) {
    const bulletColors = [
    'black', 
    'red', 
    'orange', 
    'yellow', 
    'green', 
    'light-blue', 
    'blue', 
    'violet', 
    'red-caution', 
    'info-icon', 
    'reminder-icon' ];
    
    let lines = [];
    let generateColor = function(number) {
      switch(number) {
        case 0:
          return bulletColors[number];
          break;
        case 1:
          return bulletColors[Math.floor(Math.random() * 10) + 1];
          break;
        case 2:
          return bulletColors[Math.floor(Math.random() * 3) + 8];
      }
    };
     
    _.times(qty, function(n) {
      let randomNumber = Math.floor(Math.random() * 3);
      
      if(n === 0) {
        randomNumber = 0;
      } else if (lines[n-1].level === 0) {
        randomNumber = 1;
      }

      lines.push({
        text_rendered: Faker.lorem.sentence(),
        level: randomNumber,
        bullet: generateColor(randomNumber)
      });
    });
    return lines; 
  },

  paragraphs: function(qty) { 
    let string = '';
    _.times(qty, function() {
      string += '<p>'+Faker.lorem.paragraph()+'</p>'; 
    }); 
    return string;
  },

  generateTypes: function(qty) {
    let types = [];

    _.times(qty, function() {
      types.push(Faker.lorem.word());
    });

    return types;
  },

  pickType: function(type) {
    return type[this.randomRange(0, type.length-1)];
  },

  generateMedia: function(qty) {
    let media = [];
    let numberOfObjects = this.randomRange(1, qty);

    _.times(numberOfObjects, function(index) {
      let randomImage = Faker.image.image();
      media.push({
        id: Faker.random.number(),
        mini: randomImage,
        medium: randomImage,
        visible: index === 0
      });
    });

    return media;
  },

  generateAuthors: function(qty) {
    let authors = [];
    let that = this;

    _.times(qty, function() {
      let firstName = Faker.name.firstName();
      let lastName = Faker.name.lastName();
      authors.push({
        userid: Faker.random.number(),
        username: (firstName+'.'+lastName).toLowerCase(),
        image: {
          id: Faker.random.number(),
          standard: Faker.image.avatar()
        },
        teams: [
          that.randomRange(1 ,4)
        ],
        privileges: [
          'Admin'
        ]
      });
    });

    return authors;
  },

  pickAuthor: function(authors) {
    return authors[this.randomRange(0, authors.length-1)];
  },

  generateSteps: function(qty, guideid) {
    let steps = [];
    let that = this;

    _.times(qty, function(index) {

      steps.push({
        lines: that.generateStepLines(that.randomRange(3, 7)),
        media: {
          data: that.generateMedia(3)
        },
        stepid: Faker.random.number(),
        orderby: index+1,
        guideid: this.guideid
      });
    });

    return steps;
  }
}