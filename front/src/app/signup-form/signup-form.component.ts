import { Component, OnInit, createPlatformFactory } from '@angular/core';
// Import de l'User model: User.ts
import { User } from './../User';
import { FormGroup, FormControl, Validators, FormBuilder } from '@angular/forms';
import { PostDataSignupService } from '../services/post-data-signup.service';


@Component({
  selector: 'app-signup-form',
  templateUrl: './signup-form.component.html',
  styleUrls: ['./signup-form.component.css'],
  providers: [PostDataSignupService]
})
export class SignupFormComponent implements OnInit {
  public form: FormGroup;
  //propriete pour l'User
  private user: User;

  constructor(private fb: FormBuilder, private postService:PostDataSignupService){}

  //Envoie les données du formulaire signup-form dans post-data-signup-service
  addForm(){
    const formData = this.form.value;
      this.user = new User();
      this.user.email = formData.email;
      this.user.password = formData.password;
      console.log(this.user);
      this.postService.getSignup(this.user).subscribe();
  }

  ngOnInit() {

     /*Formulaire Reactive */
     this.form = this.fb.group({
      email: ['', [Validators.required, Validators.email]],
      password: ['', [Validators.required, Validators.minLength(6)]],
      confirmPassword: ['', [Validators.required, Validators.minLength(6)]]

     });

      }

  }




