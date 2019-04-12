import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { UserFormDataSignupService } from '../services/user-form-data-signup.service';
import { User } from '../User';

@Component({
  selector: 'app-user-form',
  templateUrl: './user-form.component.html',
  styleUrls: ['./user-form.component.css'],
  providers: [UserFormComponent]
})
export class UserFormComponent implements OnInit {
  public form: FormGroup;
  //propriete pour le genre
  public gender: string[];
  //propriete pour l'User
  private user: User;

  constructor(private fb: FormBuilder, private postService:UserFormDataSignupService ) { }

  createUser(){
      const createDataUser = this.form.value;
      this.user = new User();
      this.user.lastname = createDataUser.lastname;
      this.user.email = createDataUser.email;
      this.user.id = createDataUser.id;
      this.user.firstname = createDataUser.firstname;
      this.user.birthDate = createDataUser.birthDate;
      this.user.username = createDataUser.username;
      this.user.technos = createDataUser.technos;
      this.user.newTechnos = createDataUser.newTechnos;
      this.user.poste = createDataUser.poste;
      this.user.adress = createDataUser.adress;
      this.user.newAdress = createDataUser.newAdress;
      console.log(this.user);
      this.postService.getCreateUser(this.user).subscribe();



  }

  ngOnInit() {



        this.form = this.fb.group({
            firstname:['', Validators.required],
            lastname:['', Validators.required],
            adress:['', Validators.required],
            poste:['', Validators.required],
            technos:['', Validators.required],
            gender: ['', [Validators.required]],
            username:['', Validators.required],
            birthDate:['', Validators.required],
            email: ['', [Validators.required, Validators.email]],
            password: ['', [Validators.required, Validators.minLength(6)]],
            confirmPassword: ['', [Validators.required, Validators.minLength(6)]]
        });

        this.gender = ['Male', 'Female', 'Others'];

        //creation d'un nouvel objet user
        this.user = new User({
              gender: this.gender[0], terms:false});

  }

}
