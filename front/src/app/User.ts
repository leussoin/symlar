import { EmailValidator } from '@angular/forms';

export class User {

  id: number;
  email: string;
  lastname: string;
  firstname: string;
  birthDate: number;
  username: string;
  technos: string;
  newTechnos: string;
  poste: number;
  adress: any;
  newAdress: any;


  //Both the passwords are in a single object
  password: {
    pwd: string;
    confirmPwd: string;
  };
  gender: string;
  terms: boolean;

  constructor(values: Object = {}) {
    //Constructor initialization
    Object.assign(this, values);
}

}
