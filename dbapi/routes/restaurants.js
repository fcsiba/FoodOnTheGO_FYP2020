var express = require('express');
var router = express.Router();
var db = require('../db');
var bodyParser = require('body-parser');

router.use(bodyParser.json());
//router.use(bodyParser.urlencoded({extended: true})); // for parsing application/x-www-form-urlencoded

/* GET restaurants listing. */
router.get('/', function(req, res, next) {
  var sql = "SELECT * FROM restaurants WHERE active =1";
  db.query(sql, function(err, rows, fields){
    if (err){
      res.status(500).send({error: 'Sending failed'})
    }
    res.json(rows);
  })
  
});


router.get('/:id', function(req, res, next) {
 var id = req.params.id;
 var sql = "SELECT * FROM restaurants WHERE active=1";
  db.query(sql, function(err, rows, fields){
    if (err){
      res.status(500).send({error: 'Sending failed'})
    }
    
    res.json(row[id]);
  })
  
});


router.post('/create', function(req, res, next) {
 
  var name = req.body.name;
  var image = req.body.image;
  
  var sql = 'INSERT INTO restaurants (id, name, image, active) VALUES ("${id}", "${name}", "${image}", 1)';
  db.query(sql, function(err, result){
    if(err){
      res.status(500).send({error: 'Sending failed'})
    }
    res.json({status: 'success', id: result.insertId})
  })

  
});


router.put('/update/:id', function(req, res, next) {
  var id = req.params.id;
  var name = req.body.name;
  var image = req.body.image;
  
  var sql = 'UPDATE restaurants SET name="${name}", image="${image}" WHERE id=${id}';
  db.query(sql, function(err, result){
    if(err){
      res.status(500).send({error: 'Sending failed'})
    }
    res.json({status: 'success'})
  })

  
});


router.delete('/delete/:id', function(req, res, next) {
  var id = req.params.id;

  var sql = 'DELETE FROM restaurants WHERE id=${id}';
  db.query(sql, function(err, result){
    if(err){
      res.status(500).send({error: 'Sending failed'})
    }
    res.json({status: 'success'})
  })

  
});


module.exports = router;
