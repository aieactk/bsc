PrivateMessages = new Mongo.Collection('private_messages');

Schema.PrivateMessages = new SimpleSchema({
  from: {
    type: Object
  },
  "from.id": {
    type: String
  },
  to: {
    type: Object
  },
  "to.id": {
    type: String
  },
  message: {
    type: String,
    max: 1024
  },
  created_date: {
    type: Date,
    defaultValue: new Date()
  }
});

PrivateMessages.attachSchema(Schema.PrivateMessages);
