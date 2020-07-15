var express = require('express');
var router = express.Router();
var db = require('../db');
var bodyParser = require('body-parser');

router.use(bodyParser.json());
//router.use(bodyParser.urlencoded({extended: true})); // for parsing application/x-www-form-urlencoded

/* GET menuType(maincourse etc) listing. */
router.get('/', function(req, res, next) {
  var sql = "SELECT * FROM menuitem WHERE active =1";
  db.query(sql, function(err, rows, fields){
    if (err){
      res.status(500).send({error: 'Sending failed'})
    }
    res.json(rows);
  })
  
});


router.get('/:MenuItemID', function(req, res, next) {
 var MenuItemID = req.params.MenuItemID;
 var sql = 'SELECT * FROM menuitem WHERE MenuItemID = ${MenuItemID}';
  db.query(sql, function(err, rows, fields){
    if (err){
      res.status(500).send({error: 'Sending failed'})
    }
    
    res.json(row[MenuItemID]);
  })
  
});


router.post('/create', function(req, res, next) {
 
  var MenuItemName = req.body.MenuItemName;
  var Price = req.body.Price;
  
  var sql = 'INSERT INTO menuitem (MenuItemID, MenuTypeID, MenuItemName, Price, active) VALUES ("${MenuItemID}", "${MenuTypeID}", "${MenuItemName}", "${Price}", 1)';
  db.query(sql, function(err, result){
    if(err){
      res.status(500).send({error: 'Sending failed'})
    }
    res.json({status: 'success', MenuTypeID: result.insertMenuItemID})
  })

  
});


router.put('/update/:MenuItemID', function(req, res, next) {
  var MenuItemID = req.params.MenuItemID;
  var MenuItemName = req.body.MenuItemName;
  var Price = req.body.Price;

  
  var sql = 'UPDATE menuitem SET MenuItemName="${MenuTypeName}" , Price="${Price}" WHERE MenuItemID=${MenuItemID}';
  db.query(sql, function(err, result){
    if(err){
      res.status(500).send({error: 'Sending failed'})
    }
    res.json({status: 'success'})
  })

  
});


router.delete('/delete/:MenuItemID', function(req, res, next) {
  var MenuItemID = req.params.MenuItemID;

  var sql = 'DELETE FROM menuitem WHERE MenuItemID=${MenuItemID}';
  db.query(sql, function(err, result){
    if(err){
      res.status(500).send({error: 'Sending failed'})
    }
    res.json({status: 'success'})
  })

  
});


module.exports = router;
