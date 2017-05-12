const Faker = require('faker');
const _ = require('lodash');

module.exports = function() {
  return {
    people: _.times(100, function(index) {
      return {
        id: index,
        name: Faker.name.findName(),
        avatar: Faker.internet.avatar()
      }
    })
  }
};