/*
 * Copyright (c) Microsoft Corporation. All rights reserved.
 * Licensed under the MIT License.
 */

var express = require('express');
var router = express.Router();

router.get('/', function (req, res, next) {
    if (req.session.account) {
        console.log("Username : " + req.session.account?.username);
        res.redirect('http://localhost:8888/Godrej/home/checkBuyerTokenFromSso/' + req.session.account?.tenantId + "/" + req.session.account?.localAccountId + "/" + req.session.account?.username + "/" + req.session.account?.idTokenClaims.name);
    } else {
        res.redirect('http://localhost:8888/Godrej/');
    }
    //console.log("Account Details : " + JSON.stringify(req.session.account));
    // res.render('index', {
    //     title: 'MSAL Node & Express Web App',
    //     isAuthenticated: req.session.isAuthenticated,
    //     username: req.session.account?.username,
    // });
});

module.exports = router;
