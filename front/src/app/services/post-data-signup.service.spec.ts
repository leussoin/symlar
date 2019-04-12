import { TestBed } from '@angular/core/testing';

import { PostDataSignupService } from './post-data-signup.service';

describe('PostDataSignupService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: PostDataSignupService = TestBed.get(PostDataSignupService);
    expect(service).toBeTruthy();
  });
});
