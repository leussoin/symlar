import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { User } from '../User';

@Component({
  selector: 'app-user-form',
  templateUrl: './user-form.component.html',
  styleUrls: ['./user-form.component.css']
})
export class UserFormComponent implements OnInit {


  public form: FormGroup;

  //propriete pour le genre
  public gender: string[];
  //propriete pour l'User
  private user: User;

  constructor(private fb: FormBuilder) { }

  ngOnInit() {

        this.form = this.fb.group({
            name:['', Validators.required],
            lastname:['', Validators.required],
            adress:['', Validators.required],
            poste:['', Validators.required],
            techno:['', Validators.required],
            gender: ['', [Validators.required]]
        });

        this.gender = ['Male', 'Female', 'Others'];

        //creation d'un nouvel objet user
        this.user = new User({
              gender: this.gender[0], terms:false});

  }

}
