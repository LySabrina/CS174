<?php
namespace group\hw3;

class View{

    function __construct()
    {
        
    }

    function landingPage(){
        //some html code goes here to display the landing page
        //display the policy type 
        // display the top policies 
    }
    function policyTypePage(){
        //display different policy types 
        //display the policies associated with policy type 
        //add a new policy button 
        //header should be company/POLICY_TYPE
    }

    function addPolicyTypePage(){
        //add textfield for new policy type
        ?> 
            <!Doctype>
            <html>
                <h1> <a> Monster UnderWrites </a> </h1>
                <h2> New Policy Type </h2>
                <form >
                    <input type ='textarea' placeholder="Type Name" name = 'policy-type'>
                    <button type="submit"> Add</button>

                </form>
            </html>
        <?php
    }

    function addPolicyPage(){
        //some html code goes here to display adding a new policy

    }

    function detailPolicyPage(){
        //some html code goes here to display the policy
    }

}