var express = require('express');
var router = express.Router();
var db = require('../db');
var bodyParser = require('body-parser');

router.use(bodyParser.json());
//router.use(bodyParser.urlencoded({extended: true})); // for parsing application/x-www-form-urlencoded

/* GET menuType(maincourse etc) listing. */
router.get('/', function(req, res, next) {
  var sql = "SELECT * FROM menutype WHERE active =1";
  db.query(sql, function(err, rows, fields){
    if (err){
      res.status(500).send({error: 'Sending failed'})
    }
    res.json(rows);
  })
  
});


router.get('/:MenuTypeID', function(req, res, next) {
 var MenuTypeID = req.params.MenuTypeID;
 var sql = 'SELECT * FROM menutype WHERE MenuTypeID = ${MenuTypeID}';
  db.query(sql, function(err, rows, fields){
    if (err){
      res.status(500).send({error: 'Sending failed'})
    }
    
    res.json(row[MenuTypeID]);
  })
  
});


router.post('/create', function(req, res, next) {
 
  var MenuTypeName = req.body.MenuTypeName;
  
  var sql = 'INSERT INTO menutype (MenuTypeID, MenuTypeName, id, active) VALUES ("${MenuTypeID}", "${MenuTypeName}", "${id}", 1)';
  db.query(sql, function(err, result){
    if(err){
      res.status(500).send({error: 'Sending failed'})
    }
    res.json({status: 'success', MenuTypeID: result.insertMenuTypeID})
  })

  
});


router.put('/update/:MenuTypeID', function(req, res, next) {
  var MenuTypeID = req.params.MenuTypeID;
  var MenuTypeName = req.body.MenuTypeName;

  
  var sql = 'UPDATE menutype SET MenuTypeName="${MenuTypeName}" WHERE MenuTypeID=${MenuTypeID}';
  db.query(sql, function(err, result){
    if(err){
      res.status(500).send({error: 'Sending failed'})
    }
    res.json({status: 'success'})
  })

  
});


router.delete('/delete/:MenuTypeID', function(req, res, next) {
  var MenuTypeID = req.params.MenuTypeID;

  var sql = 'DELETE FROM menutype WHERE MenuTypeID=${MenuTypeID}';
  db.query(sql, function(err, result){
    if(err){
      res.status(500).send({error: 'Sending failed'})
    }
    res.json({status: 'success'})
  })

  
});


module.exports = router;
