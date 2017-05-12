const Faker = require('faker');
const _ = require('lodash');
const Helpers = require('./helpers.js');

const guideId = Faker.random.number();
const isPublic = true;
const generatedTypes = Helpers.generateTypes(8);
const generatedAuthors = Helpers.generateAuthors(5);
const generatedSteps = Helpers.generateSteps(Helpers.randomRange(8, 15), guideId);

// NEED TO GENERATE STEPS

module.exports = function() {
  return {
    authors: generatedAuthors,
    types: generatedTypes,
    guides: _.times(20, function(index) {
      return {
        id: index,
        previous_text: Faker.lorem.sentence(),
        conclusion: Faker.lorem.paragraph(),
        guideid: guideId,
        revision: Faker.helpers.randomize().toUpperCase(),
        revisionid: Faker.random.number(),
        image: {
         id: Faker.random.number(),
         huge: Helpers.imageThumbAndMedium(index, 1024, 768)
        },
        introduction: Helpers.paragraphs(2),
        steps: generatedSteps,
        summary: Faker.lorem.sentence(),
        title: Faker.lorem.words(),
        type: Helpers.pickType(generatedTypes),
        revisionid: Faker.random.number(),
        public: isPublic,
        author: Helpers.pickAuthor(generatedAuthors),
        types: generatedTypes
      }
    })
  }
};