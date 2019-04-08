import { Component, OnInit } from '@angular/core';
// Import de l'User model: User.ts
import { User } from './../User';
import { FormGroup, FormControl, Validators, FormBuilder } from '@angular/forms';


@Component({
  selector: 'app-signup-form',
  templateUrl: './signup-form.component.html',
  styleUrls: ['./signup-form.component.css']
})
export class SignupFormComponent implements OnInit {

  public form: FormGroup;

  //propriete pour l'User
  private user: User;


  constructor(private fb: FormBuilder){}

  ngOnInit() {
    /*
    Formulaire Reactive de basa
    this.form = new FormGroup({
         email: new FormControl('', [Validators.required, Validators.email]),
          password: new FormControl('', [Validators.required, Validators.minLength(12)]),
          confirmPassword: new FormControl('', [Validators.required, Validators.minLength(12)]),
          gender: new FormControl('', [Validators.required])
     });*/

     /*Formulaire Reactive Factoriser */
     this.form = this.fb.group({
      email: ['', [Validators.required, Validators.email]],
      password: ['', [Validators.required, Validators.minLength(12)]],
      confirmPassword: ['', [Validators.required, Validators.minLength(12)]]

     });


      //creation d'un nouvel objet user
      this.user = new User({
            email:"", password: { pwd: "", confirm_pwd: ""}, terms:false});
  }

}
